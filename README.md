MPPHP
=====

PHP Library for Google Measurement Protocol.

[Measurement Protocol](https://developers.google.com/analytics/devguides/collection/protocol/v1/)

## Requirements
* PHP
* cURL

## Config

    id = enter_google_analytics_id
    
Edit **config.ini** and set value of id to your Google Analytics Tracking id.

## Usage

    $mp = new MPPHP( $cache, $adword);
    
**$cache** *boolean* Enable or disable cache busting

**$adword** *boolean* Enable or disable Google Adword tracking

#### Page tracking
    $mp->page( $cid, $dh, $dp, $dt, $options  )
    
**$cid** *string* Client id

**$dh** *string* Document host name

**$dp** *string* Document path

**$dt** *string* Document title

**$options** *array* Other optional parameters.

#### Event tracking
    $mp->event( $cid, $ec, $ea, $el, $ev, $options  )
    
**$cid** *string* Client id

**$ec** *string* Event category

**$ea** *string* Event action

**$el** *string* Event label

**$ev** *string* Event value

**$options** *array* Other optional parameters.

#### Ecommerce transaction tracking
    $mp->ecom_tran( $cid, $ti, $ta, $tr, $ts, $tt, $cu, $options  )
    
**$cid** *string* Client id

**$ti** *string* Transaction id

**$ta** *string* Transaction affilation

**$tr** *string* Transaction revenue

**$ts** *string* Transaction shipping

**$tt** *string* Transaction tax

**$cu** *string* Currency code

**$options** *array* Other optional parameters.
