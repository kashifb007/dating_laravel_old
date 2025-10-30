<?php

it('Homepage returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
