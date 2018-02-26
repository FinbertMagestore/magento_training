define([
    'jquery',
    'ko',
    'uiComponent',
    'mage/storage',
    'Bkademy_Webpos/js/model/url-builder',
    'mage/translate',
], function ($, ko, Component, storage, urlBuilder, $t) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Bkademy_Webpos/customer/customer-view'
        },

        customerData: ko.observableArray([]),
        customerGroupArray: [],

        currentFirstName: ko.observable(''),
        currentLastName: ko.observable(''),
        currentEmail: ko.observable(''),
        currentGroupId: ko.observable(''),


        getData: function(){
            return this.customerData();
        },

        setData: function(data){
            this.customerData(data);
            this.currentFirstName(data.firstname);
            this.currentLastName(data.lastname);
            this.currentEmail(data.email);
            this.currentGroupId(data.group_id);
        },

        /* Save Customer Information When Edit*/
        saveInformation: function () {
            var self = this;
            if (this.validateForm('#customer-edit-form')) {
                var customerData = this.customerData.call();
                customerData.firstname = this.currentFirstName();
                customerData.lastname = this.currentLastName();
                customerData.full_name = this.currentFirstName() + ' ' + this.currentLastName();
                customerData.email = this.currentEmail();

                var params = {};
                var serviceUrl = urlBuilder.createUrl('/webpos/customers/'+ customerData.id, params);
                var payload = {
                    customer: {
                        firstname: customerData.firstname,
                        lastname: customerData.lastname,
                        email: customerData.email
                    }
                };
                storage.put(
                    serviceUrl, JSON.stringify(payload)
                ).done(function (response) {
                    console.log(response);
                }).fail(function (response) {

                }).always(function (response){

                });
            }
        },

        /* Validation Form*/
        validateForm: function (form) {
            return true;
            return $(form).validation() && $(form).validation('isValid');
        },

    });
});

