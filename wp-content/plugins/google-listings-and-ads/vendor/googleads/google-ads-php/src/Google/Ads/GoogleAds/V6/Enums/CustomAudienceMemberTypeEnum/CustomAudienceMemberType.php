<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v6/enums/custom_audience_member_type.proto

namespace Google\Ads\GoogleAds\V6\Enums\CustomAudienceMemberTypeEnum;

use UnexpectedValueException;

/**
 * Enum containing possible custom audience member types.
 *
 * Protobuf type <code>google.ads.googleads.v6.enums.CustomAudienceMemberTypeEnum.CustomAudienceMemberType</code>
 */
class CustomAudienceMemberType
{
    /**
     * Not specified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * Used for return value only. Represents value unknown in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * Users whose interests or actions are described by a keyword.
     *
     * Generated from protobuf enum <code>KEYWORD = 2;</code>
     */
    const KEYWORD = 2;
    /**
     * Users who have interests related to the website's content.
     *
     * Generated from protobuf enum <code>URL = 3;</code>
     */
    const URL = 3;
    /**
     * Users who visit place types described by a place category.
     *
     * Generated from protobuf enum <code>PLACE_CATEGORY = 4;</code>
     */
    const PLACE_CATEGORY = 4;
    /**
     * Users who have installed a mobile app.
     *
     * Generated from protobuf enum <code>APP = 5;</code>
     */
    const APP = 5;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::KEYWORD => 'KEYWORD',
        self::URL => 'URL',
        self::PLACE_CATEGORY => 'PLACE_CATEGORY',
        self::APP => 'APP',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CustomAudienceMemberType::class, \Google\Ads\GoogleAds\V6\Enums\CustomAudienceMemberTypeEnum_CustomAudienceMemberType::class);

