@sso
Feature: SSO Login
	In order to use the SSO, login and logout needs to work.

	Scenario: Login works for a verified user
		Given a user "user"
		And I go to "/sso/login"
		When I fill in "email" with "user@kohanaframework.org"
		And I fill in "password" with "user123"
		And I press "Login"
		Then I should see "My Account"

	Scenario: Login fails with invalid password
		Given a user "user"
		And I go to "/sso/login"
		When I fill in "email" with "user@kohanaframework.org"
		And I fill in "password" with "invalid"
		And I press "Login"
		Then I should see "Login failed"

	Scenario: Login fails for an unverified user
		Given a user "user-unverified"
		And I go to "/sso/login"
		When I fill in "email" with "user-unverified@kohanaframework.org"
		And I fill in "password" with "user123"
		And I press "Login"
		Then I should see "Login failed"

	Scenario: Logout works
		Given I am logged in as "user"
		And I go to "/sso/logout"
		Then I should see "Login"

Feature: SSO Account
	Scenario: My Account page shows user data
		Given I am logged in as "user"
		And I go to "/sso"
		Then I should see "My Account"
		And the "user[first_name]" field should contain "User_FN"
		And the "user[last_name]" field should contain "User_LN"

	Scenario: Change password
		Given I am logged in as "user"
		And I go to "/sso"
		When I fill in "user[password]" with "user1234"
		And I fill in "user[password_confirm]" with "user1234"
		And I press "Update"
		Then I should see "Update successful"

	Scenario: Change name
		Given I am logged in as "user"
		And I go to "/sso"
		When I fill in "user[password]" with "user1234"
		And I fill in "user[password_confirm]" with "user1234"
		And I press "Update"
		Then I should see "Update successful"

Feature: Vanilla ProxyConnect
	Scenario: Vanilla ProxyConnect shows user data
		Given I am logged in as "user"
		And I go to "/sso/vanilla/proxyconnect"
		Then I should see "UniqueID="
		And I should see "Name=user"
		And I should see "Email=user@kohanaframework.org"

Feature: Redmine SSO
	Scenario: Redmine SSO user exists
		Given I am logged out
		And a user "user"
		And I go to "/sso/redmine/present/user"
		Then the response status code should be 200

Feature: Redmine SSO
	Scenario: Redmine SSO user exists
		Given I am logged out
		And I go to "/sso/redmine/present/invalid"
		Then the response status code should be 404

Feature: Redmine SSO
	Scenario: Redmine SSO login
		Given I am logged out
		And a user "user"
		And I go to "/sso/redmine/login" with POST data:
			| login    | user    |
			| password | user123 |
		Then the response status code should be 200

Scenario: Redmine SSO login fails with invalid password
		Given I am logged out
		And a user "user"
		And I go to "/sso/redmine/login" with POST data:
			| login    | user             |
			| password | invalid password |
		Then the response status code should be 401