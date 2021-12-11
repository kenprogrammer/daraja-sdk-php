<?php
    namespace Daraja\SDK;

    use PHPUnit\Framework\TestCase;
    use phpmock\phpunit\PHPMock;
    use phpmock\MockBuilder;

    final class MpesaTest extends TestCase
    {
        use PHPMock;

        public function testAccessTokenCanBeGenerated()
        {
            $consumer_key='YOUR_CONSUMER_KEY';
            $consumer_secret='YOUR_CONSUMER_SECRET';

            /*$access_token=[
                'access_token'=>'bY5yxSleFzHRkw9B6A7RfmV5SweK',
                'expires_in'=>'3599'
            ];*/

            //$curl_exec = $this->getFunctionMock(__NAMESPACE__, "curl_exec");
            //$curl_exec->expects($this->once())->willReturn($access_token);
    
            //$ch = curl_init();

            /*$builder = new MockBuilder();
            $builder->setNamespace(__NAMESPACE__)
                    ->setName("getAccessToken")
                    ->setFunction(
                        function () {
                            return $access_token;
                        }
                    );
                                
            $mock = $builder->build();*/

            $access_token=Mpesa::getAccessToken($consumer_key,$consumer_secret);
            $this->assertIsArray($access_token,'is an array');
            $this->assertNotEmpty($access_token,'array is not empty');
            $this->assertEquals(2,count($access_token),'array has 2 items');
            $this->assertArrayHasKey("access_token", $access_token,'array has key access_token');
            $this->assertArrayHasKey("expires_in", $access_token,'array has key expires_in');
            $this->assertNotEmpty($access_token['access_token'],'token is not empty');

        }
    }