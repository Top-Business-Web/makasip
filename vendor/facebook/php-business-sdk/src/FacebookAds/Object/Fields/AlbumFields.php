<?php
/**
 * Copyright (c) 2015-present, Facebook, Inc. All rights reserved.
 *
 * You are hereby granted a non-exclusive, worldwide, royalty-free license to
 * use, copy, modify, and distribute this software in source code or binary
 * form for use in connection with the web services and APIs provided by
 * Facebook.
 *
 * As with any software that integrates with the Facebook platform, your use
 * of this software is subject to the Facebook Developer Principles and
 * Policies [http://developers.facebook.com/policy/]. This copyright notice
 * shall be included in all copies or substantial portions of the software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 */

namespace FacebookAds\Object\Fields;

use FacebookAds\Enum\AbstractEnum;

/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */

class AlbumFields extends AbstractEnum {

  const BACKDATED_TIME = 'backdated_time';
  const BACKDATED_TIME_GRANULARITY = 'backdated_time_granularity';
  const CAN_BACKDATE = 'can_backdate';
  const CAN_UPLOAD = 'can_upload';
  const COUNT = 'count';
  const COVER_PHOTO = 'cover_photo';
  const CREATED_TIME = 'created_time';
  const DESCRIPTION = 'description';
  const EDIT_LINK = 'edit_link';
  const EVENT = 'event';
  const FROM = 'from';
  const ID = 'id';
  const IS_USER_FACING = 'is_user_facing';
  const LINK = 'link';
  const LOCATION = 'location';
  const MODIFIED_MAJOR = 'modified_major';
  const NAME = 'name';
  const PHOTO_COUNT = 'photo_count';
  const PLACE = 'place';
  const PRIVACY = 'privacy';
  const TYPE = 'type';
  const UPDATED_TIME = 'updated_time';
  const VIDEO_COUNT = 'video_count';

  public function getFieldTypes() {
    return array(
      'backdated_time' => 'datetime',
      'backdated_time_granularity' => 'string',
      'can_backdate' => 'bool',
      'can_upload' => 'bool',
      'count' => 'unsigned int',
      'cover_photo' => 'Photo',
      'created_time' => 'datetime',
      'description' => 'string',
      'edit_link' => 'Object',
      'event' => 'Event',
      'from' => 'Object',
      'id' => 'string',
      'is_user_facing' => 'bool',
      'link' => 'Object',
      'location' => 'string',
      'modified_major' => 'datetime',
      'name' => 'string',
      'photo_count' => 'unsigned int',
      'place' => 'Place',
      'privacy' => 'string',
      'type' => 'string',
      'updated_time' => 'datetime',
      'video_count' => 'unsigned int',
    );
  }
}
