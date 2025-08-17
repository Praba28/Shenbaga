jQuery(document).ready(function($) {
    var agents      = cpi_data.agents || [];
    var agentAreas  = cpi_data.agent_areas || {};
    var areaStores  = cpi_data.area_stores || {};
    var pipeOptions = cpi_data.pipe_options || {};

    $('#cpi-agent').on('change', function() {
        var agent = $(this).val();
        var $area = $('#cpi-area');

        $area.empty().append('<option value="">- Select -</option>').prop('disabled', true);
        $('#cpi-store').empty().append('<option value="">- Select Area First -</option>').prop('disabled', true);

        if (agent && agentAreas[agent]) {
            agentAreas[agent].forEach(function(area) {
                $area.append('<option value="'+area+'">'+area+'</option>');
            });
            $area.prop('disabled', false);
        }
    });

    $('#cpi-area').on('change', function() {
        var area = $(this).val();
        var $store = $('#cpi-store');

        $store.empty().append('<option value="">- Select -</option>').prop('disabled', true);

        if (area && areaStores[area]) {
            areaStores[area].forEach(function(store) {
                $store.append('<option value="'+store+'">'+store+'</option>');
            });
            $store.prop('disabled', false);
        }
    });

    $(document).on('change', '.cpi-pipe-type', function() {
        var pipeType = $(this).val();
        var $row = $(this).closest('.item-row');
        var $size = $row.find('.cpi-pipe-size');

        $size.empty().append('<option value="">- Select -</option>');

        if (pipeType && pipeOptions[pipeType] && pipeOptions[pipeType].sizes) {
            pipeOptions[pipeType].sizes.forEach(function(size) {
                $size.append('<option value="'+size+'">'+size+'</option>');
            });
            $size.prop('disabled', false);
        } else {
            $size.prop('disabled', true);
        }

        $row.find('.cpi-length').empty().append('<option value="">- Select Size First -</option>').prop('disabled', true);
    });

    $(document).on('change', '.cpi-pipe-size', function() {
        var pipeSize = $(this).val();
        var $row = $(this).closest('.item-row');
        var pipeType = $row.find('.cpi-pipe-type').val();
        var $length = $row.find('.cpi-length');

        $length.empty().append('<option value="">- Select -</option>').prop('disabled', true);

        if (pipeType && pipeSize && pipeOptions[pipeType] && pipeOptions[pipeType].lengths) {
            var target = pipeSize.replace(/"/g, '');
            var sizeKey = null;
            Object.keys(pipeOptions[pipeType].lengths).forEach(function(key) {
                if (key.replace(/"/g, '') === target) { sizeKey = key; }
            });
            if (sizeKey) {
                pipeOptions[pipeType].lengths[sizeKey].forEach(function(len) {
                    $length.append('<option value="'+len+'">'+len+'</option>');
                });
                $length.prop('disabled', false);
            }
        }
    });

    $(document).on('click', '.add-row', function() {
        var $row = $(this).closest('.item-row');
        var $clone = $row.clone();

        $clone.find('.cpi-pipe-type').val('');
        $clone.find('.cpi-pipe-size').val('').prop('disabled', true);
        $clone.find('.cpi-length').val('').prop('disabled', true);
        $clone.find('input[type="text"]').val('1');

        $clone.find('.remove-row').prop('disabled', false);
        $clone.insertAfter($row);
        $row.find('.add-row').prop('disabled', true);
    });

    $(document).on('click', '.remove-row', function() {
        if ($('.item-row').length > 1) {
            $(this).closest('.item-row').remove();
            $('.item-row:last .add-row').prop('disabled', false);
        }
    });

    $('#cpi-inventory-form').on('submit', function(e) {
        e.preventDefault();

        var valid = true;
        $(this).find('select[required], input[required]').each(function() {
            if (!$(this).val()) {
                valid = false; $(this).addClass('error');
            } else {
                $(this).removeClass('error');
            }
        });

        if (!valid) {
            $('#cpi-form-message').html('<div class="error">Please fill all required fields</div>');
            return;
        }

        var formData = $(this).serializeArray();
        formData.push({name: 'action', value: 'cpi_submit_form'});
        formData.push({name: 'security', value: cpi_data.nonce});

        $('#cpi-form-message').html('<div class="loading">Submitting...</div>');

        $.post(cpi_data.ajax_url, formData, function(response) {
            if (response && response.success) {
                $('#cpi-form-message').html('<div class="success">'+response.data+'</div>');
                $('#cpi-inventory-form')[0].reset();
                $('.item-row:gt(0)').remove();
                $('.cpi-pipe-size, .cpi-length').prop('disabled', true);
                $('.remove-row').prop('disabled', true);
                $('.item-row:last .add-row').prop('disabled', false);
                $('#cpi-area').prop('disabled', true);
                $('#cpi-store').prop('disabled', true);
            } else {
                $('#cpi-form-message').html('<div class="error">Error: '+(response ? response.data : 'Unknown')+'</div>');
            }
        }, 'json');
    });
});