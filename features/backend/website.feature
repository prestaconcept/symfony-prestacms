@backend
Feature: Website Administration
    In order to manage websites
    I need to be able to list, read and update websites

    Scenario: An admin see a list of websites
        Given I am connected with "admin" and "admin" on "/admin"
        When I follow dashboard "Websites" link "List"
        Then I should see 1 websites

    Scenario: An admin view details of a website
        Given I am connected with "admin" and "admin" on "/admin/en/presta/cmscore/website/list"
        When I follow "symfony-prestacms" website "Show"
        Then I should see the symfony-prestacms website configuration

    Scenario: An admin edit a website
        Given I am connected with "admin" and "admin" on "/admin/en/presta/cmscore/website/list"
        When I follow "symfony-prestacms" website "Edit"
        Then I should see the form to edit "symfony-prestacms" website
        And I should see a link with selected locale "en"
        And I fill in the following:
            | Theme | creative |
        And I press "Update"
        Then I should see "Item has been successfully updated."
