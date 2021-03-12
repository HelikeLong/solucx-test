<?php

use Illuminate\Http\Response;

class ClientTest extends TestCase
{
    public function testCreateClient() {
        $this->json('POST', "/api/clients", [
            'name' => 'Client 1',
            'email' => 'client1@email.com',
            'phone' => '(11) 99999-9999',
            'document' => '999.999.999-99'
        ])
            ->seeStatusCode(Response::HTTP_CREATED)
            ->seeJsonStructure([
                '*',
                'data' => [
                    'id',
                    'name',
                    'email',
                    'phone',
                    'document',
                    'created_at',
                    'updated_at'
                ]
            ]);
    }

    public function testUpdateClient() {
        $this->json('PUT', "/api/clients/1", [
            'name' => 'Client test 1',
            'email' => 'clienttest1@email.com',
            'phone' => '(11) 99999-9999',
            'document' => '999.999.999-99'
        ])
            ->seeStatusCode(Response::HTTP_OK)
            ->seeJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'email',
                    'phone',
                    'document',
                    'created_at',
                    'updated_at'
                ]
            ]);
    }

    public function testListClients() {
        $this->json('GET', "/api/clients")
            ->seeStatusCode(Response::HTTP_OK)
            ->seeJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'email',
                        'phone',
                        'document',
                        'created_at',
                        'updated_at'
                    ]
                ]
            ]);
    }

    public function testDeleteClient() {
        $this->json('DELETE', "/api/clients/1")
            ->seeStatusCode(Response::HTTP_NO_CONTENT);
    }
}
