(function(){var t={840:function(){let{Criteria:t}=Shopware.Data,{Component:i}=Shopware;i.override("sw-product-detail",{computed:{productCriteria(){let t=this.$super("productCriteria");return t.addAssociation("wucPluginStartingAidExtension"),t}},created(){console.log("Sag wallah")}})}},i={};function e(n){var a=i[n];if(void 0!==a)return a.exports;var r=i[n]={exports:{}};return t[n](r,r.exports,e),r.exports}e.p="bundles/wucpluginstartingaid/",window?.__sw__?.assetPath&&(e.p=window.__sw__.assetPath+"/bundles/wucpluginstartingaid/"),function(){"use strict";let{Criteria:t}=Shopware.Data,{Component:i}=Shopware,n=Shopware.Context;i.override("sw-product-detail-specifications",{template:'{% block sw_product_detail_specifications_measures_packaging %}\n        <sw-card title="Starting Aid Test">\n            <sw-text-field\n                v-model:value="product.extensions.startingAidData.headline"\n                class="sw-product-starting-aid__headline-field"\n                label="Starting Aid Test"\n                placeholder="Enter headline"\n                :allow-edit="acl.can(\'product.editor\')"\n            ></sw-text-field>\n        </sw-card>\n\n    {% parent %}\n{% endblock %}\n',inject:["acl","repositoryFactory"],data(){return{productId:null,startingAidData:null}},created(){this.productId=this.$route.params.id,this.loadExtension()},computed:{wucPluginStartingAidExtensionCriteria(){let i=new t;return i.addFilter(t.equals("productId",this.productId)),i},wucPluginStartingAidExtensionRepository(){return this.repositoryFactory.create("wuc_plugin_starting_aid_extension")}},methods:{loadExtension(){this.isLoading=!0,this.wucPluginStartingAidExtensionRepository.search(this.wucPluginStartingAidExtensionCriteria,n.api).then(t=>{t.last()?(console.log("Data found",t.last()),this.startingAidData=t.last(),this.product.extensions.startingAidData=t.last()):(console.log("Create and Set New Entity"),this.startingAidData=this.createAndSetNewEntity(),this.product.extensions.startingAidData=this.createAndSetNewEntity()),this.isLoading=!0})},createAndSetNewEntity(){let t=this.wucPluginStartingAidExtensionRepository.create(n.api);return t.headline="New Entity Headline",t}}}),e(840)}()})();