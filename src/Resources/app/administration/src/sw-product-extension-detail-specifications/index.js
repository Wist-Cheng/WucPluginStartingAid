const {Component} = Shopware;
const {Criteria} = Shopware.Data;
const Context = Shopware.Context;

import template from "./sw-product-extension-detail-specifications.html.twig";

Component.override('sw-product-detail-specifications', {
    template,

    inject: ['repositoryFactory'],

    data() {
        return {
            productId: null,
            startingAidData: null
        };
    },

    created() {
        this.productId = this.$route.params.id;
        this.loadExtension();
    },

    computed: {
        wucPluginStartingAidExtensionCriteria() {
            const criteria = new Criteria();
            criteria.addFilter(Criteria.equals('productId', this.productId));
            return criteria;
        },

        wucPluginStartingAidExtensionRepository() {
            return this.repositoryFactory.create('wuc_plugin_starting_aid_extension');
        }
    },

    methods: {
        loadExtension() {
            this.wucPluginStartingAidExtensionRepository
                .search(this.wucPluginStartingAidExtensionCriteria, Context.api)
                .then(startingAidData => {
                    if (startingAidData.last()) {
                        console.log('Data found', startingAidData.last());
                        this.product.extensions.wucPluginStartingAidExtension = startingAidData.last();
                    } else {
                        console.log('Create and Set New Entity');
                        this.startingAidData = this.wucPluginStartingAidExtensionRepository.create(Shopware.Context.api);
                        this.startingAidData.productId = this.productId;
                        this.startingAidData.headline = 'Test!'
                        this.product.extensions.wucPluginStartingAidExtension = this.startingAidData;

                        console.log(this.product.extensions.wucPluginStartingAidExtension);
                    }
                })
                .catch(error => {
                    console.error('Error loading extension:', error);
                });
        }
    }
});
