const {Criteria} = Shopware.Data;
const {Component} = Shopware;
const Context = Shopware.Context;

import template from "./sw-product-extension-detail-specifications.html.twig";

Component.override('sw-product-detail-specifications', {
    template,

    inject: [
        'acl', 'repositoryFactory'
    ],

    data() {
        return {
            productId: null,
            startingAidData: null,
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
        },
    },

    methods: {

        loadExtension() {
            this.isLoading = true;

            this.wucPluginStartingAidExtensionRepository
                .search(this.wucPluginStartingAidExtensionCriteria, Context.api)
                .then(startingAidData => {
                    if (startingAidData.last()) {
                        console.log('Data found', startingAidData.last());
                        this.startingAidData = startingAidData.last();
                        this.product.extensions.startingAidData = startingAidData.last();
                    } else {
                        console.log('Create and Set New Entity');
                        this.startingAidData = this.createAndSetNewEntity();
                        this.product.extensions.startingAidData = this.startingAidData;
                    }
                    this.isLoading = false; // This should be false to indicate loading is finished
                })
                .catch(error => {
                    console.error('Error loading extension:', error);
                    this.isLoading = false; // Handle the loading state properly on error
                });
        },

        createAndSetNewEntity() {
            console.log('setting new entity')
            const startingAidData = this.wucPluginStartingAidExtensionRepository.create(Context.api);
            if (startingAidData) {
                startingAidData.headline = 'New Entity Headline';
                return startingAidData;
            } else {
                console.error('Failed to create a new entity');
                return null;
            }
        },
    }
});
