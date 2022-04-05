<?php

namespace App\Traits;

use App\Models\ChangeLog;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Model;

trait Observable
{
  // bootObservable() will be called on model instantiation automatically
  public static function bootObservable() {
    static::saved(function (Model $model) {
      // create or update?
      if( $model->wasRecentlyCreated ) {
        static::logChange( $model, 'CREATED' );
      } else {
        if( !$model->getChanges() ) {
          return;
        }
        static::logChange( $model, 'UPDATED' );
      }
    });
      
    static::deleted(function (Model $model) {
      static::logChange( $model, 'DELETED' );
    });
  }
  
  public static function logChange( Model $model, string $action ) {
    ChangeLog::create([
    //   'user_id' => Auth::check() ? Auth::user()->id : null,
      'Global_Id'   => $model->Global_Id,
      'action'  => $action,
      'message' => static::logSubject($model),
      'models'  => [
        'new'     => $action !== 'DELETED' ? $model->getAttributes() : null,
        'old'     => $action !== 'CREATED' ? $model->getOriginal()   : null,
        'changed' => $action === 'UPDATED' ? $model->getChanges()    : null,
      ]
    ]);
  }

  /**
   * String to describe the model being updated / deleted / created
   * Override this in the model class
   * @return string
   */
  public static function logSubject(Model $model): string {
    return static::logImplodeAssoc($model->attributesToArray());
  }

  public static function logImplodeAssoc(array $attrs): string {
    $l = '';
    foreach( $attrs as $k => $v ) {
      $l .= "{ $k => $v } ";
    }
    return $l;
  }
}