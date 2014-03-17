@sandbox @backend
Feature: Website Administration
    In order to manage websites
    I need to be able to list, read and update websites

    Scenario: An admin see a list of websites
        Given I am connected with "admin" and "admin" on "/admin"
        When I follow dashboard "Websites" link "List"
        Then I should see 2 websites

    Scenario: An admin view details of a website
        Given I am connected with "admin" and "admin" on "/admin/en/presta/cmscore/website/list"
        When I follow "sandbox" website "Show"
        Then I should see the "sandbox" website configuration

    Scenario: An admin edit a website
        Given I am connected with "admin" and "admin" on "/admin/en/presta/cmscore/website/list"
        When I follow "sandbox" website "Edit"
        Then I should see the form to edit "sandbox" website
        And I should see a link with selected locale "fr"
        And I fill in the following:
            | Theme | creative |
        And I press "Update"
        Then I should see "Item \"sandbox\" has been successfully updated."
