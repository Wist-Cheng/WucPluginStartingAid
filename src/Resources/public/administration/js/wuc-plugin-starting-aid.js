!function(t){var e={};function n(i){if(e[i])return e[i].exports;var r=e[i]={i:i,l:!1,exports:{}};return t[i].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=t,n.c=e,n.d=function(t,e,i){n.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:i})},n.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},n.t=function(t,e){if(1&e&&(t=n(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var i=Object.create(null);if(n.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var r in t)n.d(i,r,function(e){return t[e]}.bind(null,r));return i},n.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return n.d(e,"a",e),e},n.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},n.p=(window.__sw__.assetPath + '/bundles/wucpluginstartingaid/'),n(n.s="Pkcd")}({Pkcd:function(t,e,n){"use strict";n.r(e);var i=Shopware.Component,r=Shopware.Data.Criteria,o=Shopware.Context;i.override("sw-product-detail-specifications",{template:'{% block sw_product_detail_specifications_measures_packaging %}\n        <sw-card title="Starting Aid Test">\n            <sw-text-field\n                v-model:value="product.extensions.startingAidData.headline"\n                class="sw-product-starting-aid__headline-field"\n                label="Starting Aid Test"\n                placeholder="Enter headline"\n            ></sw-text-field>\n        </sw-card>\n    {% parent %}\n{% endblock %}\n',inject:["repositoryFactory"],data:function(){return{productId:null,product:{extensions:{startingAidData:null}}}},created:function(){this.productId=this.$route.params.id,this.loadExtension()},computed:{wucPluginStartingAidExtensionCriteria:function(){var t=new r;return t.addFilter(r.equals("productId",this.productId)),t},wucPluginStartingAidExtensionRepository:function(){return this.repositoryFactory.create("wuc_plugin_starting_aid_extension")},productRepository:function(){return this.repositoryFactory.create("product")}},methods:{loadExtension:function(){var t=this;this.isLoading=!0,this.wucPluginStartingAidExtensionRepository.search(this.wucPluginStartingAidExtensionCriteria,o.api).then((function(e){e.last()?(console.log("Data found",e.last()),t.product.extensions.startingAidData=e.last()):(console.log("Create and Set New Entity"),t.product.extensions.startingAidData=t.createAndSetNewEntity()),t.isLoading=!1})).catch((function(e){console.error("Error loading extension:",e),t.isLoading=!1}))},createAndSetNewEntity:function(){console.log("setting new entity");var t=this.wucPluginStartingAidExtensionRepository.create();return t?(t.headline="Default headline",t):(console.error("Failed to create a new entity"),null)}}});n("oMP4")},oMP4:function(t,e){Shopware.Data.Criteria;Shopware.Component.override("sw-product-detail",{computed:{productCriteria:function(){var t=this.$super("productCriteria");return t.addAssociation("wucPluginStartingAidExtension"),t}}})}});
//# sourceMappingURL=wuc-plugin-starting-aid.js.map