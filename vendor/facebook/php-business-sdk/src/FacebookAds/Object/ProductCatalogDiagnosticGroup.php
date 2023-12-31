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

namespace FacebookAds\Object;

use FacebookAds\ApiRequest;
use FacebookAds\Cursor;
use FacebookAds\Http\RequestInterface;
use FacebookAds\TypeChecker;
use FacebookAds\Object\Fields\ProductCatalogDiagnosticGroupFields;
use FacebookAds\Object\Values\ProductCatalogDiagnosticGroupAffectedChannelsValues;
use FacebookAds\Object\Values\ProductCatalogDiagnosticGroupAffectedEntitiesValues;
use FacebookAds\Object\Values\ProductCatalogDiagnosticGroupAffectedEntityValues;
use FacebookAds\Object\Values\ProductCatalogDiagnosticGroupAffectedFeaturesValues;
use FacebookAds\Object\Values\ProductCatalogDiagnosticGroupSeveritiesValues;
use FacebookAds\Object\Values\ProductCatalogDiagnosticGroupSeverityValues;
use FacebookAds\Object\Values\ProductCatalogDiagnosticGroupTypeValues;
use FacebookAds\Object\Values\ProductCatalogDiagnosticGroupTypesValues;

/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */

class ProductCatalogDiagnosticGroup extends AbstractObject {

  /**
   * @return ProductCatalogDiagnosticGroupFields
   */
  public static function getFieldsEnum() {
    return ProductCatalogDiagnosticGroupFields::getInstance();
  }

  protected static function getReferencedEnums() {
    $ref_enums = array();
    $ref_enums['AffectedChannels'] = ProductCatalogDiagnosticGroupAffectedChannelsValues::getInstance()->getValues();
    $ref_enums['AffectedEntity'] = ProductCatalogDiagnosticGroupAffectedEntityValues::getInstance()->getValues();
    $ref_enums['AffectedFeatures'] = ProductCatalogDiagnosticGroupAffectedFeaturesValues::getInstance()->getValues();
    $ref_enums['Severity'] = ProductCatalogDiagnosticGroupSeverityValues::getInstance()->getValues();
    $ref_enums['Type'] = ProductCatalogDiagnosticGroupTypeValues::getInstance()->getValues();
    $ref_enums['AffectedEntities'] = ProductCatalogDiagnosticGroupAffectedEntitiesValues::getInstance()->getValues();
    $ref_enums['Severities'] = ProductCatalogDiagnosticGroupSeveritiesValues::getInstance()->getValues();
    $ref_enums['Types'] = ProductCatalogDiagnosticGroupTypesValues::getInstance()->getValues();
    return $ref_enums;
  }


}
