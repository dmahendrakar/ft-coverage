<?php

use Authoring\utils\RestClientHelper;
use GuzzleHttp\Client;

/**
 * Created by PhpStorm.
 * User: dmahendrakar
 * Date: 2/16/18
 * Time: 9:44 AM
 */
class FunctionalTestCest {
	/**
	 * @test check locale switch for new locale
	 */
	public function ft( \FunctionalTester $i ) {
		$i->sendAjaxGetRequest('http://localhost/wordpress/wp-json/test/reflect', [
			'value' => 'abcd'
		]);

		$i->seeResponseCodeIs( 200 );
		$i->assertEquals($i->getResponseContent(), '"dcba"');
	}
}