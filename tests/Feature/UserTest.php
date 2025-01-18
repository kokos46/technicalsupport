<?php

test('example', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
});

test('example2', function () {
    $response = $this->withSession([])->get('/techsupport');

    $response->assertStatus(200);
});
