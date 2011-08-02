@sso
Feature: SSO Login
	In order to use the SSO, login needs to work.

	Scenario: Login works for a verified user
		Given I go to "/sso/login"
		When I fill in "email" with "user@kohanaframework.org"
		And I fill in "password" with "user123"
		And I press "Login"
		Then I should see "My Account"

	Scenario: Login fails for an unverified user
		Given I go to "/sso/login"
		When I fill in "email" with "user-unverified@kohanaframework.org"
		And I fill in "password" with "user123"
		And I press "Login"
		Then I should see "Login failed"

	Scenario: Login fails with invalid password
		Given I go to "/sso/login"
		When I fill in "email" with "user@kohanaframework.org"
		And I fill in "password" with "invalid"
		And I press "Login"
		Then I should see "Login failed"

Feature: SSO Account
	Scenario: My Account Page
		Given I go to "/sso"
		And I am logged in as "admin"
		Then I should see "My Account"

	Scenario: My Account Page
		Given I go to "/sso"
		And I am logged in as "user"
		Then I should see "My Account"