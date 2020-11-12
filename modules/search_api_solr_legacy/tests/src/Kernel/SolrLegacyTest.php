<?php

namespace Drupal\Tests\search_api_solr_legacy\Kernel;

use Drupal\search_api_solr_legacy_test\Plugin\SolrConnector\Solr36TestConnector;
use Drupal\Tests\search_api_solr\Kernel\SearchApiSolrTest;

/**
 * Tests index and search capabilities using the Solr search backend.
 *
 * @group search_api_solr_legacy
 */
class SolrLegacyTest extends SearchApiSolrTest {

  /**
   * {@inheritdoc}
   */
  public static $modules = [
    'search_api_solr_legacy',
    'search_api_solr_legacy_test',
  ];

  /**
   * {@inheritdoc}
   */
  protected function installConfigs() {
    parent::installConfigs();

    $this->installConfig([
      'search_api_solr_legacy',
      'search_api_solr_legacy_test',
    ]);

    // Swap the connector.
    Solr36TestConnector::adjustBackendConfig('search_api.server.solr_search_server');
  }

  /**
   * Tests the conversion of Search API queries into Solr queries.
   */
  protected function checkSchemaLanguages() {
    // Solr 3.6 doesn't provide the required REST API.
  }

}
