define(
    [
        'jquery',
        'ko',
        'uiComponent'
    ],
    function($, ko, Component) {
        'use strict';
        return Component.extend({

            defaults: {
                template: 'Magestore_CustomerAjaxLogin/product/test'
            },

            initialize: function() {
                this._super();
                this.qty = ko.observable(this.defaultQty);
                this.price = ko.observable(this.defaultPrice);
                this.productList = ko.observableArray([]);
                this.totalPrice = ko.computed(function() {
                    return this.qty() * this.price();
                }, this);
            },

            qtyChanged: function() {
                var newQty = parseInt($('input[name="qty"]').val());
                if (isNaN(newQty)) {
                    $('input[name="qty"]').val('1');
                    newQty = 1;
                }
                this.qty(parseInt(newQty));
                $('input[name="qty"]').val(newQty);
            },

            priceChanged: function() {
                var newPrice = parseInt($('input[name="price"]').val());
                if (isNaN(newPrice)) {
                    $('input[name="price"]').val('1');
                    newPrice = 1;
                }
                this.price(parseInt(newPrice));
                $('input[name="price"]').val(newPrice);
            },

            getProduct: function () {
                var self = this;
                $.getJSON("ajaxget", function(data) {
                    console.log(data)
                    var productsResponse = data['products'];
                    productsResponse.forEach(function(item){
                        self.productList.push(item)
                    });
                })
            }

        });
    }
);
