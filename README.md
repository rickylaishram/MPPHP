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
    
**$cid** Client id

**$dh** Document host name

**$dp** Document path

**$dt** Document title

**$options** *array* Other optional parameters.

#### Event tracking
    $mp->event( $cid, $ec, $ea, $el, $ev, $options  );
    
**$cid** Client id

**$ec** Event category

**$ea** Event action

**$el** Event label

**$ev** Event value

**$options** *array* Other optional parameters.

#### Ecommerce transaction tracking
    $mp->ecom_tran( $cid, $ti, $ta, $tr, $ts, $tt, $cu, $options  );
    
**$cid** Client id

**$ti** Transaction id

**$ta** Transaction affilation

**$tr** Transaction revenue

**$ts** Transaction shipping

**$tt** Transaction tax

**$cu** Currency code

**$options** *array* Other optional parameters.

#### Ecommerce item tracking
    $mp->ecom_item( $cid, $ti, $in, $ip, $iq, $ic, $iv, $cu, $options  );
    
**$cid** Client id

**$ti** Transaction id

**$in** Item name

**$ip** Item price

**$iq** Item quantity

**$ic** Item code

**$iv** Item category

**$cu** Currency code

**$options** *array* Other optional parameters.

#### Social tracking
    $mp->social( $cid, $sa, $sn, $st, $options  );
    
**$cid** Client id

**$sa** Social Action

**$sn** Social Network

**$st** Social Target

**$options** *array* Other optional parameters.

#### Exception tracking
    $mp->exception( $cid, $exd, $exf, $options  );
    
**$cid** Client id

**$exd** Exception description

**$exf** Is fatal?

**$options** *array* Other optional parameters.

#### Timing tracking
    $mp->timing( $cid, $utc, $utv, $utt, $utl, $options  );
    
**$cid** Client id

**$utc** Timing category

**$utv** Timing variable

**$utt** Timing time

**$utl** Timing label

**$options** *array* Other optional parameters.


Refer to the [parameters reference](https://developers.google.com/analytics/devguides/collection/protocol/v1/parameters) for type of data allowed and optional parameners.
