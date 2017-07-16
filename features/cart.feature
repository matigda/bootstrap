Feature: Product cart
  In order to buy products
  As a customer
  I need to be able to put interesting products into a cart

  Scenario: Checking cart price with one product
    Given there are following products:
        | name            | size | sku    | price |
        | Bluza polo      |  42  | sksk   |  100  |
    When I add them to the cart
    Then I should have 1 products in the cart
    And the overall cart price should be 100

  Scenario: Adding percentage discount to cart with one product
    Given there are following products:
      | name            | size | sku    | price |
      | Bluza polo      |  42  | sksk   |  200  |
    When I add them to the cart
    And I add cart coupon with 20 percent discount
    Then the overall cart price should be 160

  Scenario: Adding value discount to cart with one product
    Given there are following products:
      | name            | size | sku    | price |
      | Bluza polo      |  42  | sksk   |  200  |
    When I add them to the cart
    And I add cart coupon with 20 value discount
    Then the overall cart price should be 180


  Scenario: Adding product percentage discount to cart
    Given there are following products:
      | name            | size | sku        | price |
      | Bluza polo      |  42  | sksk       |  200  |
      | Bluza polo 2    |  42  | other-sku  |  200  |
    When I add them to the cart
    And I add product coupon to product with "sksk" sku with 20 percent discount
    Then the overall cart price should be 360


    # @TODO - testy na kupony do koszyka + do produktu i testy na wykluczające się kupony
