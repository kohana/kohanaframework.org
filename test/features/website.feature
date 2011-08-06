@website
Feature: The Website Works
	In order to use the website, all the links need to work and the proper
	information should be provided.

	Scenario: Home Page
		Given I go to "/"
		Then I should see "Download"
		And I should see "Giving back"
		And I should see "Forum"

	Scenario: Download
		Given I go to "/"
		When I follow "Download"
		Then the response status code should be 200
		And I should see "Current stable release of the 3.2.x series"
		When I follow "Download v3.2.0"
		Then the response status code should be 200

	Scenario: Docs
		Given I go to "/"
		When I follow "Documentation"
		Then the response status code should be 200
		And I should see "Kohana v3.2 Documentation"
		And I should see "For documentation of v2.x"

	Scenario: Development
		Given I go to "/"
		When I follow "Development"
		Then the response status code should be 200
		And I should see "All official development is by the"

	Scenario: Error 404
		Given I go to "/downloadd"
		Then the response status code should be 404
		And I should see "[404]: Unable to find a route to match the URI: downloadd"

	Scenario: Error 500
		Given I go to "/error"
		Then the response status code should be 500
		And I should see "[500]: This is an intentional exception"