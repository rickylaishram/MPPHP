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
