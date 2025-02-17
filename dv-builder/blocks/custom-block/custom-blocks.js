(function () {
    'use strict';
    var el = wp.element.createElement;
    var registerBlockType = wp.blocks.registerBlockType;

    var blocks = [
        { name: 'simple-block', title: 'Website Email', icon: 'email', option: 'emailOpt', defaultText: 'Website Email' },
        { name: 'website-address', title: 'Website Address', icon: 'admin-customizer', option: 'addressOpt', defaultText: 'Website Address' },
        { name: 'website-phone', title: 'Website Phone', icon: 'phone', option: 'phoneOpt', defaultText: 'Website Phone' },
        { name: 'working-hours', title: 'Working Hours', icon: 'clock', option: 'hoursOpt', defaultText: 'Working Hours' },
        { name: 'facebook-link', title: 'Facebook Link', icon: 'facebook', option: 'fbUrl', defaultText: 'Facebook Link' },
        { name: 'linkedin-link', title: 'LinkedIn Link', icon: 'linkedin', option: 'linkdUrl', defaultText: 'LinkedIn Link' },
        { name: 'instagram-link', title: 'Instagram Link', icon: 'instagram', option: 'instUrl', defaultText: 'Instagram Link' },
        { name: 'twitter-link', title: 'X / Twitter Link', icon: 'twitter', option: 'xUrl', defaultText: 'X / Twitter Link' },
        { name: 'youtube-link', title: 'YouTube Link', icon: 'video-alt3', option: 'youtubeUrl', defaultText: 'YouTube Link' },
        { name: 'tiktok-link', title: 'TikTok Link', icon: 'media-video', option: 'tiktokUrl', defaultText: 'TikTok Link' },
        { name: 'whatsapp-link', title: 'WhatsApp Link', icon: 'whatsapp', option: 'whtsAppUrl', defaultText: 'WhatsApp Link' },
        { name: 'pinterest-link', title: 'Pinterest Link', icon: 'admin-links', option: 'pintUrl', defaultText: 'Pinterest Link' },
        { name: 'business-address', title: 'Business Address', icon: 'admin-customizer', option: 'businessaddr', defaultText: 'Business Address' },
        { name: 'copyright', title: 'Copyright', icon: 'admin-customizer', option: 'copyright', defaultText: 'Copyright' }
    ];

    blocks.forEach(function (block) {
        registerBlockType('custom/' + block.name, {
            title: block.title,
            icon: block.icon,
            category: 'common',
            edit: function () {
                var value = simpleBlockOptions[block.option] || block.defaultText;
                return el('p', null, value);
            },
            save: function () {
                var value = simpleBlockOptions[block.option] || block.defaultText;
                return el('p', null, value);
            },
        });
    });

})();
