const {Component} = Shopware;
const {Criteria} = Shopware.Data;
const Context = Shopware.Context;

import template from "./sw-product-extension-detail-specifications.html.twig";

Component.override('sw-product-detail-specifications', {
    template,

    inject: [
        'repositoryFactory'
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
                        this.product.extensions.startingAidData = this.createAndSetNewEntity();
                    }
                    this.isLoading = false;
                })
                .catch(error => {
                    console.error('Error loading extension:', error);
                    this.isLoading = false;
                });
        },

        createAndSetNewEntity() {
            console.log('setting new entity')
            const startingAidData = this.wucPluginStartingAidExtensionRepository.create(Context.api);
            if (startingAidData) {
                startingAidData.headline = 'Default headline';
                return startingAidData;
            } else {
                console.error('Failed to create a new entity');
                return null;
            }
        },
    }
});
