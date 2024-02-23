<?php

use PHPUnit\Framework\TestCase;
use phpmock\phpunit\PHPMock;

require __DIR__ . '/../classes/contact.classes.php';

class ContactTest extends TestCase
{
    use PHPMock;
    
    private $contact;

    protected function setUp(): void
    {
        // Initialize a Contact object before each test
        $this->contact = new Contact("Test Name", "Test Subject", "test@example.com", "Test Message");
    }

    public function testSendContactInfo()
    {
        // Mock the mail function
        $mailMock = $this->getFunctionMock('YourNamespace', 'mail');
        $mailMock->expects($this->once())->willReturn(true);
    
        // This is a basic test to ensure sendContactInfo() does not throw an exception
        // You may need to modify this test based on how your mail function is set up
        $this->expectNotToPerformAssertions();
        $this->contact->sendContactInfo();
    }

    public function testEmptyInput()
    {
        $this->assertTrue($this->contact->emptyInput());
    }

    public function testInvalidName()
    {
        $this->assertFalse($this->contact->invalidName());
    }

    public function testInvalidSubject()
    {
        $this->assertFalse($this->contact->invalidSubject());
    }

    public function testInvalidEmail()
    {
        $this->assertFalse($this->contact->invalidEmail());
    }
}