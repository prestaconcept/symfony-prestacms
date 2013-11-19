#@mink:zombie
Feature: Fresh Symfony PrestaCMS installation
    In order to start developing a PrestaCMS application
    As a smart developer
    I need to be able to see the default Symfony PrestaCMS Home page

Scenario: View the home page
    Given I am on the homepage
    Then I should see "Congratulation Symfony PrestaCMS is installed"
