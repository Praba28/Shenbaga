jQuery(document).ready(function($) {
    // Status history modal
    $(document).on('click', '.view-history', function(e) {
        e.preventDefault();
        var submissionId = $(this).data('submission-id');

        $.post(cpi_admin_data.ajax_url, {
            action: 'get_audit_history',
            submission_id: submissionId,
            nonce: cpi_admin_data.nonce
        }, function(response) {
            if (response && response.success) {
                $('#audit-history-modal .audit-history-content').html(response.data);
                $('#audit-history-modal').show();
            } else {
                alert('Error: ' + (response ? response.data : 'Unknown'));
            }
        }, 'json');

        return false;
    });

    // Items history modal
    $(document).on('click', '.view-items-audit', function(e) {
        e.preventDefault();
        var submissionId = $(this).data('submission-id');

        $.post(cpi_admin_data.ajax_url, {
            action: 'get_items_audit',
            submission_id: submissionId,
            nonce: cpi_admin_data.nonce
        }, function(response) {
            if (response && response.success) {
                $('#items-audit-modal .audit-history-content').html(response.data);
                $('#items-audit-modal').show();
            } else {
                alert('Error: ' + (response ? response.data : 'Unknown'));
            }
        }, 'json');

        return false;
    });

    // Edit items modal open
    $(document).on('click', '.edit-items', function(e) {
        e.preventDefault();
        var submissionId = $(this).data('submission-id');
        $('#edit-submission-id').val(submissionId);
        $('#edit-items-container').html('<p>Loading items...</p>');

        $.post(cpi_admin_data.ajax_url, {
            action: 'get_order_items',
            submission_id: submissionId,
            nonce: cpi_admin_data.nonce
        }, function(response) {
            if (response && response.success) {
                $('#edit-items-container').html(response.data);
                $('#edit-items-modal').show();
            } else {
                alert('Error: ' + (response ? response.data : 'Unknown'));
            }
        }, 'json');

        return false;
    });

    // Delegated handlers inside Edit Items modal (no optional chaining for compatibility)
    $(document).on('change', '#edit-items-container .cpi-pipe-type', function() {
        var $row = $(this).closest('.item-row');
        var pipeType = $(this).val();
        var $size = $row.find('.cpi-pipe-size');

        $size.empty().append('<option value="">- Select -</option>');

        if (pipeType && cpi_admin_data.pipe_options[pipeType] && cpi_admin_data.pipe_options[pipeType].sizes) {
            cpi_admin_data.pipe_options[pipeType].sizes.forEach(function(size) {
                $size.append('<option value="'+size+'">'+size+'</option>');
            });
        }

        $row.find('.cpi-length').empty().append('<option value="">- Select Size First -</option>');
    });

    $(document).on('change', '#edit-items-container .cpi-pipe-size', function() {
        var $row = $(this).closest('.item-row');
        var pipeSize = $(this).val();
        var pipeType = $row.find('.cpi-pipe-type').val();
        var $length = $row.find('.cpi-length');

        $length.empty().append('<option value="">- Select -</option>');

        var opts = cpi_admin_data.pipe_options[pipeType];
        if (opts && opts.lengths) {
            var target = (pipeSize || '').replace(/"/g, '');
            var sizeKey = null;
            Object.keys(opts.lengths).forEach(function(key) {
                if (key.replace(/"/g, '') === target) { sizeKey = key; }
            });
            if (sizeKey) {
                opts.lengths[sizeKey].forEach(function(len) {
                    $length.append('<option value="'+len+'">'+len+'</option>');
                });
            }
        }
    });

    // Add/Remove rows in edit modal
    $(document).on('click', '#add-item-row', function() {
        var $last = $('#edit-items-container .item-row:last');
        var $clone = $last.clone();

        $clone.find('select').val('');
        $clone.find('input[type="text"]').val('1');
        $clone.insertAfter($last);
    });

    $(document).on('click', '#edit-items-container .remove-row', function() {
        if ($('#edit-items-container .item-row').length > 1) {
            $(this).closest('.item-row').remove();
        } else {
            alert('At least one item is required');
        }
    });

    // Close modals
    $(document).on('click', '.cpi-close-modal', function() { $(this).closest('.cpi-modal').hide(); });
    $(window).on('click', function(e) { if ($(e.target).is('.cpi-modal')) { $('.cpi-modal').hide(); } });

    // Select all orders
    $('#select-all-orders').on('change', function() {
        $('input[name="selected_orders[]"]').prop('checked', this.checked);
    });
});