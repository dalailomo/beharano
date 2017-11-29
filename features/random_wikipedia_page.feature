Feature: Extract title and links from a random page on wikipedia
  Scenario: Extract title and links
    Given I am on "https://es.wikipedia.org/wiki/Especial:Aleatoria"
     Then I dump everything that matches "#firstHeading"
     Then I dump everything that matches "#bodyContent a"

