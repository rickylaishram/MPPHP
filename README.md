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
    $mp->page( $cid, $dh, $dp, $dt, $options  );
    
**$cid** *string* Client id

**$dh** *string* Document host name

**$dp** *string* Document path

**$dt** *string* Document title

**$options** *array* Other optional parameters.

#### Event tracking
    $mp->event( $cid, $ec, $ea, $el, $ev, $options  );
    
**$cid** *string* Client id

**$ec** *string* Event category

**$ea** *string* Event action

**$el** *string* Event label

**$ev** *string* Event value

**$options** *array* Other optional parameters.

#### Ecommerce transaction tracking
    $mp->ecom_tran( $cid, $ti, $ta, $tr, $ts, $tt, $cu, $options  );
    
**$cid** *string* Client id

**$ti** *string* Transaction id

**$ta** *string* Transaction affilation

**$tr** *string* Transaction revenue

**$ts** *string* Transaction shipping

**$tt** *string* Transaction tax

**$cu** *string* Currency code

**$options** *array* Other optional parameters.

#### Ecommerce item tracking
    $mp->ecom_item( $cid, $ti, $in, $ip, $iq, $ic, $iv, $cu, $options  );
    
**$cid** *string* Client id

**$ti** *string* Transaction id

**$in** *string* Item name

**$ip** *string* Item price

**$iq** *string* Item quantity

**$ic** *string* Item code

**$iv** *string* Item category

**$cu** *string* Currency code

**$options** *array* Other optional parameters.

#### Social tracking
    $mp->social( $cid, $sa, $sn, $st, $options  );
    
**$cid** *string* Client id

**$sa** *string* Social Action

**$sn** *string* Social Network

**$st** *string* Social Target

**$options** *array* Other optional parameters.

#### Exception tracking
    $mp->exception( $cid, $exd, $exf, $options  );
    
**$cid** *string* Client id

**$exd** *string* Exception description

**$exf** *boolean* Is fatal?

**$options** *array* Other optional parameters.
