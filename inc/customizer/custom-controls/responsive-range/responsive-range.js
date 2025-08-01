/**
 * Responsive Range Control JavaScript
 *
 * @package Inspiro
 * @since Inspiro 2.0.8
 */

(function($) {
    'use strict';

    /**
     * Initialize responsive range controls
     */
    wp.customize.controlConstructor['inspiro-responsive-range'] = wp.customize.Control.extend({
        ready: function() {
            var control = this;
            var container = control.container;

            // Initialize default device
            control.setActiveDevice('desktop');

            // Handle device button clicks
            container.find('.inspiro-responsive-device-buttons button').on('click', function(e) {
                e.preventDefault();
                var device = $(this).data('device');
                control.setActiveDevice(device);
            });

            // Handle range slider changes
            container.find('.inspiro-control-range').on('input change', function() {
                var device = $(this).data('device');
                var value = $(this).val();
                var numberInput = container.find('.inspiro-control-range-value[data-device="' + device + '"]');
                
                numberInput.val(value);
                control.updateSettingValue(device, value);
            });

            // Handle number input changes
            container.find('.inspiro-control-range-value').on('input change', function() {
                var device = $(this).data('device');
                var value = $(this).val();
                var rangeInput = container.find('.inspiro-control-range[data-device="' + device + '"]');
                
                rangeInput.val(value);
                control.updateSettingValue(device, value);
            });

            // Initialize with current values
            control.initializeValues();
        },

        /**
         * Set active device
         */
        setActiveDevice: function(device) {
            var control = this;
            var container = control.container;

            // Update button states
            container.find('.inspiro-responsive-device-buttons button').removeClass('active');
            container.find('.inspiro-responsive-device-buttons button[data-device="' + device + '"]').addClass('active');

            // Show/hide device controls
            container.find('.inspiro-device-controls').hide();
            container.find('.inspiro-device-' + device).show();

            // Update customizer preview device
            if (wp.customize.previewedDevice) {
                wp.customize.previewedDevice.set(device);
            }
        },

        /**
         * Update setting value based on device
         */
        updateSettingValue: function(device, value) {
            var control = this;
            
            if (device === 'desktop') {
                // For desktop, update the main setting
                control.setting.set(value);
            } else {
                // For tablet/mobile, use the device-specific settings
                var settingId = control.params.device_settings && control.params.device_settings[device] 
                    ? control.params.device_settings[device] 
                    : control.id + '-' + device;
                    
                if (wp.customize.settings.settings[settingId]) {
                    wp.customize(settingId).set(value);
                }
            }
        },

        /**
         * Initialize control values
         */
        initializeValues: function() {
            var control = this;
            var container = control.container;
            
            // Set desktop value
            var desktopValue = control.setting.get();
            container.find('.inspiro-control-range[data-device="desktop"]').val(desktopValue);
            container.find('.inspiro-control-range-value[data-device="desktop"]').val(desktopValue);

            // Set tablet value
            var tabletSettingId = control.params.device_settings && control.params.device_settings.tablet 
                ? control.params.device_settings.tablet 
                : control.id + '-tablet';
                
            if (wp.customize.settings.settings[tabletSettingId]) {
                var tabletValue = wp.customize(tabletSettingId).get();
                container.find('.inspiro-control-range[data-device="tablet"]').val(tabletValue);
                container.find('.inspiro-control-range-value[data-device="tablet"]').val(tabletValue);
            } else if (control.params.devices && control.params.devices.tablet) {
                // Use default value from PHP
                var tabletDefault = control.params.devices.tablet;
                container.find('.inspiro-control-range[data-device="tablet"]').val(tabletDefault);
                container.find('.inspiro-control-range-value[data-device="tablet"]').val(tabletDefault);
            }

            // Set mobile value  
            var mobileSettingId = control.params.device_settings && control.params.device_settings.mobile 
                ? control.params.device_settings.mobile 
                : control.id + '-mobile';
                
            if (wp.customize.settings.settings[mobileSettingId]) {
                var mobileValue = wp.customize(mobileSettingId).get();
                container.find('.inspiro-control-range[data-device="mobile"]').val(mobileValue);
                container.find('.inspiro-control-range-value[data-device="mobile"]').val(mobileValue);
            } else if (control.params.devices && control.params.devices.mobile) {
                // Use default value from PHP
                var mobileDefault = control.params.devices.mobile;
                container.find('.inspiro-control-range[data-device="mobile"]').val(mobileDefault);
                container.find('.inspiro-control-range-value[data-device="mobile"]').val(mobileDefault);
            }
        }
    });

    /**
     * Sync device switcher with customizer preview
     */
    $(document).ready(function() {
        // Listen for customizer device changes
        if (wp.customize.previewedDevice) {
            wp.customize.previewedDevice.bind(function(device) {
                $('.inspiro-responsive-device-buttons button').removeClass('active');
                $('.inspiro-responsive-device-buttons button[data-device="' + device + '"]').addClass('active');
                $('.inspiro-device-controls').hide();
                $('.inspiro-device-' + device).show();
            });
        }
    });

})(jQuery); 