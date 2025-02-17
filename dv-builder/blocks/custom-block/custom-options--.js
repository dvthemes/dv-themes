(function() {
    'use strict';

    var el = wp.element.createElement;
    var registerBlockType = wp.blocks.registerBlockType;

    registerBlockType('custom/simple-block', {
        title: 'Website Email',
        icon: 'email',
        category: 'common',
		attributes: {
            emlOpt: {
                type: 'string',
                default: 'Website Email'
            },
        },
		edit: function(props) {
            var emlOptValue = simpleBlockOptions.emlOpt;
			return el('p', null, emlOptValue+'Test');
        },
        save: function(props) {
			var emlOptValue = simpleBlockOptions.emlOpt;
            return el('p', null, emlOptValue);
        },
    });
	
	registerBlockType('custom/website-address', {
        title: 'Website Address',
        icon: 'admin-customizer',
        category: 'common',
        attributes: {
            addressOpt: {
                type: 'string',
                default: 'Website Address'
            },
        },
        edit: function(props) {
            var addressValue = addressBlockOpt.addressOpt;
			console.log('emlOptValue:', addressValue);
            return el('p', null, addressValue);
        },
        save: function(props) {
            var addressValue = addressBlockOpt.addressOpt;
            return el('p', null, addressValue);
        },
    });
	
	
})();
