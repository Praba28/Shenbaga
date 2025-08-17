<?php
/*
Plugin Name: Custom Pipe Inventory
Description: Advanced pipe inventory management system with dynamic forms and order management
Version: 2.1.2
Author: Your Name
*/

defined('ABSPATH') || exit;

/** Reusable pipe options (used in form, admin, and AJAX) */
function cpi_get_pipe_options() {
    return array(
        'SENBAGA' => array(
            'sizes' => ['3/4"', '1"', '1-1/4"', '1-1/2"', '2"', '2-1/2"', '3"', '4"', '5"', '6"', '7"', '8"', '1/2"'],
            'lengths' => array(
                '3/4"' => ['1MM', '1.5MM', '2MM', '10KG', '15KG', '2MM EXTRA', 'BLUE PIPE'],
                '1"' => ['1MM', '1.5MM', '2MM', '10KG', '15KG', '2MM EXTRA'],
                '1-1/4"' => ['6KG', '15KG'],
                '1-1/2"' => ['6KG', '15KG'],
                '2"' => ['4KG', '6KG'],
                '2-1/2"' => ['4KG', '6KG'],
                '3"' => ['2.5KG', '4KG', '6KG'],
                '4"' => ['2.5KG', '4KG', '6KG'],
                '5"' => ['4KG', '6KG'],
                '6"' => ['4KG', '6KG'],
                '7"' => ['4KG', '6KG'],
                '8"' => ['4KG', '6KG'],
                '1/2"' => ['15KG', '1MM', '2MM']
            )
        ),
        'UPVC' => array(
            'sizes' => ['3/4"', '1"', '1-1/4"', '1-1/2"'],
            'lengths' => array(
                '3/4"' => ['Standard'],
                '1"' => ['Standard'],
                '1-1/4"' => ['Standard'],
                '1-1/2"' => ['Standard']
            )
        ),
        'YOGA' => array(
            'sizes' => ['3/4"', '1"', '1-1/4"', '1-1/2"', '2"', '2-1/2"', '3"', '4"', '5"', '6"', '7"', '8"', '1/2"'],
            'lengths' => array(
                '3/4"' => ['1MM', '1.5MM', '2MM', '10KG', '15KG'],
                '1"' => ['1MM', '1.5MM', '2MM', '10KG', '15KG'],
                '1-1/4"' => ['6KG', '15KG'],
                '1-1/2"' => ['6KG', '15KG'],
                '2"' => ['4KG', '6KG'],
                '2-1/2"' => ['4KG', '6KG'],
                '3"' => ['4KG', '6KG'],
                '4"' => ['4KG', '6KG'],
                '5"' => ['4KG', '6KG'],
                '6"' => ['4KG', '6KG'],
                '7"' => ['4KG', '6KG'],
                '8"' => ['4KG', '6KG'],
                '1/2"' => ['15KG']
            )
        ),
        'ISI' => array(
            'sizes' => ['2"', '2-1/2"', '3"', '4"', '5"', '6"', '7"', '8"'],
            'lengths' => array(
                '2"' => ['4KG', '6KG'],
                '2-1/2"' => ['4KG', '6KG'],
                '3"' => ['4KG', '6KG'],
                '4"' => ['4KG', '6KG'],
                '5"' => ['4KG', '6KG'],
                '6"' => ['4KG', '6KG'],
                '7"' => ['4KG', '6KG'],
                '8"' => ['4KG', '6KG']
            )
        ),
        'GARDEN HOSE' => array(
            'sizes' => ['1/2"', '3/4"', '1"', '1-1/4"'],
            'lengths' => array(
                '1/2"' => ['Standard'],
                '3/4"' => ['Standard'],
                '1"' => ['Standard'],
                '1-1/4"' => ['Standard', 'WATERTUBE LEVEL']
            )
        ),
        'BRAIDED HOSE' => array(
            'sizes' => ['1/2"', '3/4"', '1"', '1-1/4"'],
            'lengths' => array(
                '1/2"' => ['Standard'],
                '3/4"' => ['Standard', 'HEAVY 8KG'],
                '1"' => ['Standard', 'HEAVY 10KG'],
                '1-1/4"' => ['Standard']
            )
        ),
        'CASING' => array(
            'sizes' => ['4"', '5"', '6"', '7"', '7-1/2"', '8"'],
            'lengths' => array(
                '4"' => ['CM'],
                '5"' => ['CS', 'CM'],
                '6"' => ['CS'],
                '7"' => ['CS', 'CM'],
                '7-1/2"' => ['CS', 'CM'],
                '8"' => ['CS', 'CM']
            )
        ),
        'BEND' => array(
            'sizes' => ['1/2"', '3/4"', '1"', '1-1/4"', '1-1/2"', '2"', '2-1/2"', '3"', '4"'],
            'lengths' => array(
                '1/2"' => ['2MM'],
                '3/4"' => [
                    '1.5MM', '2MM S', '2MM L', '15KG',
                    '1.5MM IVORY', '2MM IVORY', '1.5MM YOGA', '2MM YOGA'
                ],
                '1"' => [
                    '1.5MM', '2MM S', '2MM L', '10KG', '15KG',
                    '1.5MM IVORY', '2MM IVORY', '1.5MM YOGA', '2MM YOGA'
                ],
                '1-1/4"' => ['6KG', '15KG'],
                '1-1/2"' => ['6KG', '15KG'],
                '2"' => ['4KG', '6KG'],
                '2-1/2"' => ['4KG', '6KG'],
                '3"' => ['4KG', '6KG'],
                '4"' => ['4KG', '6KG']
            )
        ),
        'COUPLER' => array(
            'sizes' => ['3/4"', '1"', '1-1/4"', '1-1/2"', '2"', '2-1/2"', '3"', '4"'],
            'lengths' => array(
                '3/4"' => ['15KG'],
                '1"' => ['10KG', '15KG'],
                '1-1/4"' => ['6KG', '15KG'],
                '1-1/2"' => ['6KG', '15KG'],
                '2"' => ['4KG', '6KG', '4KG PLAIN'],
                '2-1/2"' => ['4KG', '6KG', '4KG PLAIN'],
                '3"' => ['4KG', '6KG', '4KG PLAIN'],
                '4"' => ['4KG', '6KG', '4KG PLAIN']
            )
        ),
        'WATER TANK' => array(
            'sizes' => ['500L', '750L', '1000L', '2000L', '5000L'],
            'lengths' => array(
                '500L' => ['WHITE', 'YELLOW'],
                '750L' => ['WHITE', 'YELLOW'],
                '1000L' => ['WHITE', 'YELLOW'],
                '2000L' => ['WHITE', 'YELLOW'],
                '5000L' => ['WHITE', 'YELLOW', 'LID']
            )
        ),
        'IVORY' => array(
            'sizes' => ['1/2"', '3/4"', '1"'],
            'lengths' => array(
                '1/2"' => ['Standard'],
                '3/4"' => ['1MM', '1.5MM', '2MM', '2MM EXTRA THICK'],
                '1"' => ['1MM', '1.5MM', '2MM', '2MM EXTRA THICK']
            )
        ),
        'HDPE' => array(
            'sizes' => ['1/4"', '1/2"', '3/4"', '1"', '1-1/4"', '1-1/2"', '2"', '2-1/2"', '3"', '4-1/2"'],
            'lengths' => array(
                '1/4"' => ['10KG'],
                '1/2"' => ['10KG'],
                '3/4"' => ['10KG'],
                '1"' => ['6KG', '8KG', '10KG'],
                '1-1/4"' => ['6KG', '8KG', '10KG', '12KG'],
                '1-1/2"' => ['4KG', '6KG', '8KG', '10KG'],
                '2"' => ['4KG', '6KG', '8KG', '10KG'],
                '2-1/2"' => ['4KG', '6KG', '8KG', '10KG', '12.5KG'],
                '3"' => ['4KG', '6KG', '8KG', '10KG'],
                '4-1/2"' => ['4KG', '6KG', '8KG', '10KG']
            )
        )
    );
}

/** DB setup */
register_activation_hook(__FILE__, 'cpi_create_tables');
function cpi_create_tables() {
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $submissions_table = $wpdb->prefix . 'cpi_submissions';
    $items_table       = $wpdb->prefix . 'cpi_items';
    $audit_log_table   = $wpdb->prefix . 'cpi_audit_logs';
    $items_audit_table = $wpdb->prefix . 'cpi_items_audit';

    $sql1 = "CREATE TABLE $submissions_table (
        id INT(11) NOT NULL AUTO_INCREMENT,
        username VARCHAR(255) NOT NULL,
        agent VARCHAR(255) NOT NULL,
        area VARCHAR(255) NOT NULL,
        store VARCHAR(255) NOT NULL,
        submission_date DATE NOT NULL,
        status ENUM('New','InProgress','Delivered','Pending') DEFAULT 'New',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        KEY submission_date (submission_date),
        KEY status (status),
        KEY agent (agent),
        KEY store (store)
    ) $charset_collate;";

    $sql2 = "CREATE TABLE $items_table (
        id INT(11) NOT NULL AUTO_INCREMENT,
        submission_id INT(11) NOT NULL,
        pipe_type VARCHAR(50) NOT NULL,
        pipe_size VARCHAR(50) NOT NULL,
        length VARCHAR(50) NOT NULL,
        quantity TEXT NOT NULL,
        PRIMARY KEY (id),
        KEY submission_id (submission_id)
    ) $charset_collate;";

    $sql3 = "CREATE TABLE $audit_log_table (
        id INT(11) NOT NULL AUTO_INCREMENT,
        submission_id INT(11) NOT NULL,
        changed_by VARCHAR(255) NOT NULL,
        changed_field VARCHAR(255) NOT NULL,
        old_value TEXT NOT NULL,
        new_value TEXT NOT NULL,
        changed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        KEY submission_id (submission_id)
    ) $charset_collate;";

    $sql4 = "CREATE TABLE $items_audit_table (
        id INT(11) NOT NULL AUTO_INCREMENT,
        submission_id INT(11) NOT NULL,
        changed_by VARCHAR(255) NOT NULL,
        changed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        old_items TEXT NOT NULL,
        new_items TEXT NOT NULL,
        PRIMARY KEY (id),
        KEY submission_id (submission_id)
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    try {
        dbDelta($sql1);
        dbDelta($sql2);
        dbDelta($sql3);
        dbDelta($sql4);

        // Backfill for older installs
        $columns = $wpdb->get_col("SHOW COLUMNS FROM $submissions_table", 0);
        if (!in_array('username', $columns, true)) {
            $wpdb->query("ALTER TABLE $submissions_table ADD username VARCHAR(255) NOT NULL AFTER id");
        }
        if (!in_array('status', $columns, true)) {
            $wpdb->query("ALTER TABLE $submissions_table ADD status ENUM('New','InProgress','Delivered','Pending') DEFAULT 'New' AFTER store");
        }
    } catch (Exception $e) {
        error_log('Pipe Inventory DB Error: ' . $e->getMessage());
    }
}

/** Admin menu + hook early loader for exports (prevents HTML in CSV) */
add_action('admin_menu', 'cpi_admin_menu');
function cpi_admin_menu() {
    $hook = add_menu_page(
        'Order Management', 'Order Management', 'manage_options',
        'order-management', 'cpi_order_management_page', 'dashicons-clipboard', 30
    );
    add_action("load-$hook", 'cpi_order_management_load'); // run before any HTML

    add_submenu_page(
        'order-management', 'Inventory Dashboard', 'Inventory Dashboard',
        'manage_options', 'inventory-dashboard', 'cpi_dashboard_page'
    );

    add_submenu_page(
        'order-management', 'Settings', 'Settings',
        'manage_options', 'pipe-settings', 'cpi_settings_page'
    );
}

/** CSV cell sanitizer to prevent CSV injection */
function cpi_csv_safe($v) {
    $v = (string) $v;
    if (preg_match('/^[=\+\-@]/', $v)) {
        return "'" . $v;
    }
    return $v;
}

/** Handle export on load-$hook (no HTML leading junk) */
function cpi_order_management_load() {
    if (!current_user_can('manage_options')) { return; }

    if (
        isset($_GET['export'], $_GET['action']) &&
        $_GET['export'] === 'csv' &&
        $_GET['action'] === 'export_csv'
    ) {
        if (!isset($_GET['cpi_export_nonce']) || !wp_verify_nonce($_GET['cpi_export_nonce'], 'cpi_export_orders')) {
            wp_die('Unauthorized export');
        }

        global $wpdb;
        $submissions_table = $wpdb->prefix . 'cpi_submissions';
        $items_table       = $wpdb->prefix . 'cpi_items';

        $selected_ids = array();
        if (!empty($_GET['selected_orders']) && is_array($_GET['selected_orders'])) {
            foreach ($_GET['selected_orders'] as $id) {
                $selected_ids[] = (int) $id;
            }
        }
        $selected_ids = array_filter(array_unique($selected_ids));
        if (empty($selected_ids)) {
            wp_die('No orders selected for export');
        }

        $id_list = implode(',', array_map('intval', $selected_ids));

        $export_data = $wpdb->get_results("
            SELECT s.*,
                   GROUP_CONCAT(CONCAT(i.pipe_type, ' - ', i.pipe_size, ' - ', i.length, ': ', i.quantity) SEPARATOR '; ') AS items
            FROM $submissions_table s
            LEFT JOIN $items_table i ON s.id = i.submission_id
            WHERE s.id IN ($id_list)
            GROUP BY s.id
        ");

        nocache_headers();
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=orders_export_' . date('Ymd_His') . '.csv');

        $output = fopen('php://output', 'w');
        fputcsv($output, array('ID', 'Date', 'Agent', 'Area', 'Store', 'Status', 'Items'));

        foreach ($export_data as $row) {
            fputcsv($output, array(
                cpi_csv_safe($row->id),
                cpi_csv_safe($row->submission_date),
                cpi_csv_safe($row->agent),
                cpi_csv_safe($row->area),
                cpi_csv_safe($row->store),
                cpi_csv_safe($row->status),
                cpi_csv_safe($row->items)
            ));
        }

        fclose($output);
        exit;
    }
}

/** Order Management page */
function cpi_order_management_page() {
    if (!current_user_can('manage_options')) {
        wp_die('Unauthorized');
    }

    global $wpdb;
    $submissions_table = $wpdb->prefix . 'cpi_submissions';
    $items_table       = $wpdb->prefix . 'cpi_items';
    $audit_log_table   = $wpdb->prefix . 'cpi_audit_logs';

    // STATUS UPDATE (non-ajax)
    if (isset($_POST['update_status'])) {
        if (!isset($_POST['cpi_update_status_nonce']) || !wp_verify_nonce($_POST['cpi_update_status_nonce'], 'cpi_update_status')) {
            wp_die('Unauthorized status update');
        }

        $submission_id = isset($_POST['submission_id']) ? (int) $_POST['submission_id'] : 0;
        $new_status    = isset($_POST['new_status']) ? sanitize_text_field(wp_unslash($_POST['new_status'])) : '';
        $allowed       = array('New', 'InProgress', 'Delivered', 'Pending');
        if (!$submission_id || !in_array($new_status, $allowed, true)) {
            wp_die('Invalid status update');
        }

        $current_user = wp_get_current_user()->display_name;
        $old_status = $wpdb->get_var($wpdb->prepare("SELECT status FROM $submissions_table WHERE id = %d", $submission_id));

        $wpdb->update(
            $submissions_table,
            array('status' => $new_status),
            array('id' => $submission_id),
            array('%s'),
            array('%d')
        );

        if ($old_status !== $new_status) {
            $wpdb->insert($audit_log_table, array(
                'submission_id' => $submission_id,
                'changed_by'    => $current_user,
                'changed_field' => 'status',
                'old_value'     => $old_status,
                'new_value'     => $new_status
            ));
        }

        wp_redirect(esc_url_raw(admin_url('admin.php?page=order-management')));
        exit;
    }

    // ITEM UPDATE (non-ajax)
    if (isset($_POST['update_items'])) {
        if (!isset($_POST['cpi_update_items_nonce']) || !wp_verify_nonce($_POST['cpi_update_items_nonce'], 'cpi_update_items')) {
            wp_die('Unauthorized item update');
        }

        $submission_id = isset($_POST['submission_id']) ? (int) $_POST['submission_id'] : 0;
        if (!$submission_id) {
            wp_die('Invalid submission');
        }

        $current_user = wp_get_current_user()->display_name;

        // Old items for audit
        $old_items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $items_table WHERE submission_id = %d", $submission_id));
        $old_items_str = '';
        foreach ($old_items as $item) {
            $old_items_str .= "{$item->pipe_type} - {$item->pipe_size} - {$item->length}: {$item->quantity}; ";
        }
        $old_items_str = rtrim($old_items_str, '; ');

        // Normalize arrays with wp_unslash to prevent backslashes like 1/2\"
        $types   = isset($_POST['pipe_type']) ? array_map(function($v){ return sanitize_text_field(wp_unslash($v)); }, (array) $_POST['pipe_type']) : array();
        $sizes   = isset($_POST['pipe_size']) ? array_map(function($v){ return sanitize_text_field(wp_unslash($v)); }, (array) $_POST['pipe_size']) : array();
        $lengths = isset($_POST['length'])    ? array_map(function($v){ return sanitize_text_field(wp_unslash($v)); }, (array) $_POST['length'])    : array();
        $qtys    = isset($_POST['quantity'])  ? array_map(function($v){ return sanitize_text_field(wp_unslash($v)); }, (array) $_POST['quantity'])  : array();

        $count = min(count($types), count($sizes), count($lengths), count($qtys));
        if ($count === 0) { wp_die('No items provided'); }

        $new_items_str = '';
        $wpdb->query('START TRANSACTION');

        try {
            $wpdb->delete($items_table, array('submission_id' => $submission_id));

            for ($i = 0; $i < $count; $i++) {
                $type   = $types[$i];
                $size   = $sizes[$i];
                $length = $lengths[$i];
                $qty    = $qtys[$i];

                $ok = $wpdb->insert($items_table, array(
                    'submission_id' => $submission_id,
                    'pipe_type'     => $type,
                    'pipe_size'     => $size,
                    'length'        => $length,
                    'quantity'      => $qty
                ));
                if (false === $ok) {
                    throw new Exception($wpdb->last_error);
                }

                $new_items_str .= "{$type} - {$size} - {$length}: {$qty}; ";
            }

            $new_items_str = rtrim($new_items_str, '; ');

            $wpdb->insert($wpdb->prefix . 'cpi_items_audit', array(
                'submission_id' => $submission_id,
                'changed_by'    => $current_user,
                'old_items'     => $old_items_str,
                'new_items'     => $new_items_str
            ));

            $wpdb->query('COMMIT');

            wp_redirect(esc_url_raw(admin_url('admin.php?page=order-management')));
            exit;
        } catch (Exception $e) {
            $wpdb->query('ROLLBACK');
            wp_die('Failed to update items.');
        }
    }

    // Filters
    $where  = array();
    $params = array();

    if (!empty($_GET['search'])) {
        $search = sanitize_text_field(wp_unslash($_GET['search']));
        $where[] = "(agent LIKE %s OR store LIKE %s OR area LIKE %s OR username LIKE %s)";
        $params[] = "%$search%"; $params[] = "%$search%"; $params[] = "%$search%"; $params[] = "%$search%";
    }

    if (!empty($_GET['status']) && in_array($_GET['status'], array('New','InProgress','Delivered','Pending'), true)) {
        $where[] = "status = %s";
        $params[] = sanitize_text_field(wp_unslash($_GET['status']));
    }

    if (!empty($_GET['start_date']) && !empty($_GET['end_date'])) {
        $start_date = sanitize_text_field(wp_unslash($_GET['start_date']));
        $end_date   = sanitize_text_field(wp_unslash($_GET['end_date']));
        $where[]  = "submission_date BETWEEN %s AND %s";
        $params[] = $start_date; $params[] = $end_date;
    }

    $where_sql = !empty($where) ? 'WHERE ' . implode(' AND ', $where) : '';

    // Sorting
    $orderby = isset($_GET['orderby']) ? sanitize_text_field(wp_unslash($_GET['orderby'])) : 'created_at';
    $order   = isset($_GET['order']) ? strtoupper(sanitize_text_field(wp_unslash($_GET['order']))) : 'DESC';
    $order   = in_array($order, array('ASC','DESC'), true) ? $order : 'DESC';

    $allowed_columns = ['id', 'agent', 'area', 'store', 'submission_date', 'status', 'created_at'];
    if (!in_array($orderby, $allowed_columns, true)) {
        $orderby = 'created_at';
    }

    $query = "SELECT * FROM $submissions_table $where_sql ORDER BY $orderby $order";
    if (!empty($params)) {
        $query = $wpdb->prepare($query, $params);
    }
    $submissions = $wpdb->get_results($query);

    // Enqueue admin assets
    wp_enqueue_style('cpi-admin-css', plugin_dir_url(__FILE__) . 'assets/css/admin-style.css', array(), '2.1.2');
    wp_enqueue_script('cpi-admin-js', plugin_dir_url(__FILE__) . 'assets/js/admin-script.js', array('jquery'), '2.1.2', true);
    wp_localize_script('cpi-admin-js', 'cpi_admin_data', array(
        'ajax_url'     => admin_url('admin-ajax.php'),
        'nonce'        => wp_create_nonce('cpi_admin_nonce'),
        'pipe_options' => cpi_get_pipe_options(),
    ));
    ?>
    <div class="wrap">
        <h1>Order Management</h1>

        <!-- Search and Filter Form -->
        <form method="get" action="<?php echo esc_url(admin_url('admin.php')); ?>" class="cpi-filter-form">
            <input type="hidden" name="page" value="order-management">

            <div class="search-box">
                <input type="search" name="search" value="<?php echo isset($_GET['search']) ? esc_attr(wp_unslash($_GET['search'])) : ''; ?>" placeholder="Search...">
                <input type="submit" class="button" value="Search">
            </div>

            <div class="advanced-filters">
                <h3>Advanced Filters</h3>
                <div class="filter-row">
                    <div class="filter-group">
                        <label>Status:</label>
                        <select name="status">
                            <option value="">All Statuses</option>
                            <option value="New" <?php selected(($_GET['status'] ?? ''), 'New'); ?>>New</option>
                            <option value="InProgress" <?php selected(($_GET['status'] ?? ''), 'InProgress'); ?>>In Progress</option>
                            <option value="Delivered" <?php selected(($_GET['status'] ?? ''), 'Delivered'); ?>>Delivered</option>
                            <option value="Pending" <?php selected(($_GET['status'] ?? ''), 'Pending'); ?>>Pending</option>
                        </select>
                    </div>

                    <div class="filter-group">
                        <label>Date Range:</label>
                        <input type="date" name="start_date" value="<?php echo isset($_GET['start_date']) ? esc_attr(wp_unslash($_GET['start_date'])) : ''; ?>">
                        <span>to</span>
                        <input type="date" name="end_date" value="<?php echo isset($_GET['end_date']) ? esc_attr(wp_unslash($_GET['end_date'])) : ''; ?>">
                    </div>

                    <div class="filter-group">
                        <input type="submit" class="button button-primary" value="Apply Filters">
                        <a href="<?php echo esc_url(admin_url('admin.php?page=order-management')); ?>" class="button">Reset</a>
                    </div>
                </div>
            </div>
        </form>

        <!-- Export Form (separate; avoids nested forms) -->
        <form method="get" action="<?php echo esc_url(admin_url('admin.php')); ?>" id="cpi-export-form">
            <input type="hidden" name="page" value="order-management">
            <input type="hidden" name="export" value="csv">
            <?php wp_nonce_field('cpi_export_orders', 'cpi_export_nonce'); ?>

            <div class="tablenav top">
                <div class="alignleft actions">
                    <select name="action" id="bulk-action-selector-top">
                        <option value="">Bulk Actions</option>
                        <option value="export_csv">Export to CSV</option>
                    </select>
                    <input type="submit" id="doaction" class="button action" value="Apply">
                </div>
            </div>
        </form>

        <!-- Orders Table (no enclosing form) -->
        <table class="wp-list-table widefat fixed striped cpi-order-table sortable">
            <thead>
                <tr>
                    <th class="check-column"><input type="checkbox" id="select-all-orders"></th>
                    <th class="sortable <?php echo $orderby === 'id' ? 'sorted ' . strtolower($order) : 'sortable'; ?>">
                        <a href="<?php echo esc_url(add_query_arg(['orderby' => 'id', 'order' => ($orderby === 'id' && $order === 'DESC') ? 'ASC' : 'DESC'])); ?>">
                            <span>ID</span><span class="sorting-indicator"></span>
                        </a>
                    </th>
                    <th class="sortable <?php echo $orderby === 'submission_date' ? 'sorted ' . strtolower($order) : 'sortable'; ?>">
                        <a href="<?php echo esc_url(add_query_arg(['orderby' => 'submission_date', 'order' => ($orderby === 'submission_date' && $order === 'DESC') ? 'ASC' : 'DESC'])); ?>">
                            <span>Date</span><span class="sorting-indicator"></span>
                        </a>
                    </th>
                    <th class="sortable <?php echo $orderby === 'agent' ? 'sorted ' . strtolower($order) : 'sortable'; ?>">
                        <a href="<?php echo esc_url(add_query_arg(['orderby' => 'agent', 'order' => ($orderby === 'agent' && $order === 'DESC') ? 'ASC' : 'DESC'])); ?>">
                            <span>Agent</span><span class="sorting-indicator"></span>
                        </a>
                    </th>
                    <th class="sortable <?php echo $orderby === 'store' ? 'sorted ' . strtolower($order) : 'sortable'; ?>">
                        <a href="<?php echo esc_url(add_query_arg(['orderby' => 'store', 'order' => ($orderby === 'store' && $order === 'DESC') ? 'ASC' : 'DESC'])); ?>">
                            <span>Store</span><span class="sorting-indicator"></span>
                        </a>
                    </th>
                    <th>Order Details</th>
                    <th class="sortable <?php echo $orderby === 'status' ? 'sorted ' . strtolower($order) : 'sortable'; ?>">
                        <a href="<?php echo esc_url(add_query_arg(['orderby' => 'status', 'order' => ($orderby === 'status' && $order === 'DESC') ? 'ASC' : 'DESC'])); ?>">
                            <span>Status</span><span class="sorting-indicator"></span>
                        </a>
                    </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($submissions)) : ?>
                    <tr><td colspan="8">No orders found</td></tr>
                <?php else : ?>
                    <?php foreach ($submissions as $sub) : ?>
                        <?php
                        $items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $items_table WHERE submission_id = %d", $sub->id));
                        ?>
                        <tr>
                            <th scope="row" class="check-column">
                                <input type="checkbox" name="selected_orders[]" value="<?php echo esc_attr($sub->id); ?>" form="cpi-export-form">
                            </th>
                            <td><?php echo (int) $sub->id; ?></td>
                            <td><?php echo esc_html(date('d/m/Y', strtotime($sub->submission_date))); ?></td>
                            <td><?php echo esc_html($sub->agent); ?></td>
                            <td><?php echo esc_html($sub->store); ?></td>
                            <td>
                                <div class="order-details">
                                    <?php foreach ($items as $item) : ?>
                                        <div class="order-item">
                                            <span class="item-type"><?php echo esc_html(stripslashes($item->pipe_type)); ?></span>
                                            <span class="item-size"><?php echo esc_html(stripslashes($item->pipe_size)); ?></span>
                                            <span class="item-length"><?php echo esc_html(stripslashes($item->length)); ?></span>
                                            <span class="item-quantity"><?php echo esc_html(stripslashes($item->quantity)); ?></span>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </td>
                            <td>
                                <form method="post" class="status-form">
                                    <?php wp_nonce_field('cpi_update_status', 'cpi_update_status_nonce'); ?>
                                    <input type="hidden" name="submission_id" value="<?php echo esc_attr($sub->id); ?>">
                                    <select name="new_status" class="status-select">
                                        <option value="New" <?php selected($sub->status, 'New'); ?>>New</option>
                                        <option value="InProgress" <?php selected($sub->status, 'InProgress'); ?>>In Progress</option>
                                        <option value="Delivered" <?php selected($sub->status, 'Delivered'); ?>>Delivered</option>
                                        <option value="Pending" <?php selected($sub->status, 'Pending'); ?>>Pending</option>
                                    </select>
                                    <button type="submit" name="update_status" class="button button-small">Update</button>
                                </form>
                            </td>
                            <td>
                                <a href="#" class="view-history" data-submission-id="<?php echo esc_attr($sub->id); ?>">Status History</a><br>
                                <a href="#" class="view-items-audit" data-submission-id="<?php echo esc_attr($sub->id); ?>">Items History</a><br>
                                <a href="#" class="edit-items" data-submission-id="<?php echo esc_attr($sub->id); ?>">Edit Items</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Status History Modal -->
        <div id="audit-history-modal" class="cpi-modal">
            <div class="cpi-modal-content">
                <span class="cpi-close-modal">&times;</span>
                <h2>Status History</h2>
                <div class="audit-history-content"></div>
            </div>
        </div>

        <!-- Items History Modal -->
        <div id="items-audit-modal" class="cpi-modal">
            <div class="cpi-modal-content">
                <span class="cpi-close-modal">&times;</span>
                <h2>Items Change History</h2>
                <div class="audit-history-content"></div>
            </div>
        </div>

        <!-- Edit Items Modal -->
        <div id="edit-items-modal" class="cpi-modal">
            <div class="cpi-modal-content">
                <span class="cpi-close-modal">&times;</span>
                <h2>Edit Order Items</h2>
                <form id="cpi-edit-items-form" method="post">
                    <?php wp_nonce_field('cpi_update_items', 'cpi_update_items_nonce'); ?>
                    <input type="hidden" name="submission_id" id="edit-submission-id" value="">
                    <div class="items-container" id="edit-items-container"></div>
                    <div class="form-submit">
                        <button type="submit" name="update_items" class="button button-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}

/** Settings page */
function cpi_settings_page() {
    if (!current_user_can('manage_options')) { wp_die('Unauthorized'); }

    if (isset($_POST['cpi_settings'])) {
        check_admin_referer('cpi_save_settings', 'cpi_settings_nonce');
        update_option('cpi_agents', sanitize_textarea_field(wp_unslash($_POST['agents'] ?? '')));
        update_option('cpi_agent_areas', sanitize_textarea_field(wp_unslash($_POST['agent_areas'] ?? '')));
        update_option('cpi_area_stores', sanitize_textarea_field(wp_unslash($_POST['area_stores'] ?? '')));
        update_option('cpi_form_access', sanitize_text_field(wp_unslash($_POST['form_access'] ?? 'public')));
        echo '<div class="notice notice-success"><p>Settings saved!</p></div>';
    }

    $agents       = get_option('cpi_agents', "Agent 1\nAgent 2\nAgent 3");
    $agent_areas  = get_option('cpi_agent_areas', "Agent 1: Area 1,Area 2\nAgent 2: Area 3,Area 4");
    $area_stores  = get_option('cpi_area_stores', "Area 1: Store A,Store B\nArea 2: Store C,Store D");
    $form_access  = get_option('cpi_form_access', 'public');

    ?>
    <div class="wrap">
        <h1>Pipe Inventory Settings</h1>
        <form method="post">
            <?php wp_nonce_field('cpi_save_settings', 'cpi_settings_nonce'); ?>
            <table class="form-table">
                <tr>
                    <th><label>Agents</label></th>
                    <td>
                        <textarea name="agents" rows="5" cols="50"><?php echo esc_textarea($agents); ?></textarea>
                        <p class="description">Enter one agent per line</p>
                    </td>
                </tr>
                <tr>
                    <th><label>Agent Areas</label></th>
                    <td>
                        <textarea name="agent_areas" rows="5" cols="50"><?php echo esc_textarea($agent_areas); ?></textarea>
                        <p class="description">Format: Agent: Area1,Area2 (one per line)</p>
                    </td>
                </tr>
                <tr>
                    <th><label>Area Stores</label></th>
                    <td>
                        <textarea name="area_stores" rows="5" cols="50"><?php echo esc_textarea($area_stores); ?></textarea>
                        <p class="description">Format: Area: Store1,Store2 (one per line)</p>
                    </td>
                </tr>
                <tr>
                    <th><label>Form Access</label></th>
                    <td>
                        <label><input type="radio" name="form_access" value="public" <?php checked($form_access, 'public'); ?>> Public</label><br>
                        <label><input type="radio" name="form_access" value="logged_in" <?php checked($form_access, 'logged_in'); ?>> Logged-in Users Only</label>
                    </td>
                </tr>
            </table>
            <?php submit_button('Save Settings', 'primary', 'cpi_settings'); ?>
        </form>
    </div>
    <?php
}

/** Dashboard page */
function cpi_dashboard_page() {
    if (!current_user_can('manage_options')) { wp_die('Unauthorized'); }

    global $wpdb;
    $submissions_table = $wpdb->prefix . 'cpi_submissions';
    $items_table       = $wpdb->prefix . 'cpi_items';

    $search = '';
    if (!empty($_GET['search'])) { $search = sanitize_text_field(wp_unslash($_GET['search'])); }

    $orderby = isset($_GET['orderby']) ? sanitize_text_field(wp_unslash($_GET['orderby'])) : 'created_at';
    $order   = isset($_GET['order']) ? strtoupper(sanitize_text_field(wp_unslash($_GET['order']))) : 'DESC';
    $order   = in_array($order, array('ASC','DESC'), true) ? $order : 'DESC';

    $allowed_columns = ['id', 'username', 'agent', 'area', 'store', 'submission_date', 'created_at'];
    if (!in_array($orderby, $allowed_columns, true)) { $orderby = 'created_at'; }

    $query  = "SELECT * FROM $submissions_table";
    $params = array();

    if ($search) {
        $query .= " WHERE agent LIKE %s OR store LIKE %s OR area LIKE %s OR username LIKE %s";
        $params[] = "%$search%"; $params[] = "%$search%"; $params[] = "%$search%"; $params[] = "%$search%";
    }

    $query .= " ORDER BY $orderby $order";
    if (!empty($params)) { $query = $wpdb->prepare($query, $params); }

    $submissions = $wpdb->get_results($query);

    wp_enqueue_style('cpi-admin-css', plugin_dir_url(__FILE__) . 'assets/css/admin-style.css', array(), '2.1.2');

    ?>
    <div class="wrap">
        <h1>Inventory Dashboard</h1>

        <form method="get" action="<?php echo esc_url(admin_url('admin.php')); ?>">
            <input type="hidden" name="page" value="inventory-dashboard">
            <p class="search-box">
                <input type="search" name="search" value="<?php echo esc_attr($search); ?>" placeholder="Search...">
                <input type="submit" class="button" value="Search">
            </p>
        </form>

        <table class="wp-list-table widefat fixed striped sortable">
            <thead>
                <tr>
                    <th class="sortable <?php echo $orderby === 'id' ? 'sorted ' . strtolower($order) : 'sortable'; ?>">
                        <a href="<?php echo esc_url(add_query_arg(['orderby' => 'id', 'order' => ($orderby === 'id' && $order === 'DESC') ? 'ASC' : 'DESC'])); ?>">
                            <span>ID</span><span class="sorting-indicator"></span>
                        </a>
                    </th>
                    <th class="sortable <?php echo $orderby === 'username' ? 'sorted ' . strtolower($order) : 'sortable'; ?>">
                        <a href="<?php echo esc_url(add_query_arg(['orderby' => 'username', 'order' => ($orderby === 'username' && $order === 'DESC') ? 'ASC' : 'DESC'])); ?>">
                            <span>Username</span><span class="sorting-indicator"></span>
                        </a>
                    </th>
                    <th class="sortable <?php echo $orderby === 'agent' ? 'sorted ' . strtolower($order) : 'sortable'; ?>">
                        <a href="<?php echo esc_url(add_query_arg(['orderby' => 'agent', 'order' => ($orderby === 'agent' && $order === 'DESC') ? 'ASC' : 'DESC'])); ?>">
                            <span>Agent</span><span class="sorting-indicator"></span>
                        </a>
                    </th>
                    <th class="sortable <?php echo $orderby === 'area' ? 'sorted ' . strtolower($order) : 'sortable'; ?>">
                        <a href="<?php echo esc_url(add_query_arg(['orderby' => 'area', 'order' => ($orderby === 'area' && $order === 'DESC') ? 'ASC' : 'DESC'])); ?>">
                            <span>Area</span><span class="sorting-indicator"></span>
                        </a>
                    </th>
                    <th class="sortable <?php echo $orderby === 'store' ? 'sorted ' . strtolower($order) : 'sortable'; ?>">
                        <a href="<?php echo esc_url(add_query_arg(['orderby' => 'store', 'order' => ($orderby === 'store' && $order === 'DESC') ? 'ASC' : 'DESC'])); ?>">
                            <span>Store</span><span class="sorting-indicator"></span>
                        </a>
                    </th>
                    <th class="sortable <?php echo $orderby === 'submission_date' ? 'sorted ' . strtolower($order) : 'sortable'; ?>">
                        <a href="<?php echo esc_url(add_query_arg(['orderby' => 'submission_date', 'order' => ($orderby === 'submission_date' && $order === 'DESC') ? 'ASC' : 'DESC'])); ?>">
                            <span>Date</span><span class="sorting-indicator"></span>
                        </a>
                    </th>
                    <th>Items</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($submissions)) : ?>
                    <tr><td colspan="7">No submissions found</td></tr>
                <?php else : ?>
                    <?php foreach ($submissions as $sub) : ?>
                        <?php $items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $items_table WHERE submission_id = %d", $sub->id)); ?>
                        <tr>
                            <td><?php echo (int) $sub->id; ?></td>
                            <td><?php echo esc_html($sub->username); ?></td>
                            <td><?php echo esc_html($sub->agent); ?></td>
                            <td><?php echo esc_html($sub->area); ?></td>
                            <td><?php echo esc_html($sub->store); ?></td>
                            <td><?php echo esc_html(date('d/m/Y', strtotime($sub->submission_date))); ?></td>
                            <td>
                                <ul>
                                    <?php foreach ($items as $item) : ?>
                                        <li>
                                            <?php echo esc_html(stripslashes($item->pipe_type)); ?> -
                                            <?php echo esc_html(stripslashes($item->pipe_size)); ?> -
                                            <?php echo esc_html(stripslashes($item->length)); ?>:
                                            <?php echo esc_html(stripslashes($item->quantity)); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}

/** Front-end form [pipe_inventory_form] */
add_shortcode('pipe_inventory_form', 'cpi_form_shortcode');
function cpi_form_shortcode() {
    $form_access = get_option('cpi_form_access', 'public');
    if ($form_access === 'logged_in' && !is_user_logged_in()) {
        return '<div class="cpi-access-error">You must be logged in to access this form.</div>';
    }

    wp_enqueue_script('cpi-form-js', plugin_dir_url(__FILE__) . 'assets/js/form-script.js', array('jquery'), '2.1.2', true);
    wp_enqueue_style('cpi-form-css', plugin_dir_url(__FILE__) . 'assets/css/form-style.css', array(), '2.1.2');

    $agents       = array_filter(array_map('trim', explode("\n", get_option('cpi_agents', ''))));
    $agent_areas  = cpi_parse_settings(get_option('cpi_agent_areas', ''));
    $area_stores  = cpi_parse_settings(get_option('cpi_area_stores', ''));
    $pipe_options = cpi_get_pipe_options();

    wp_localize_script('cpi-form-js', 'cpi_data', array(
        'ajax_url'     => admin_url('admin-ajax.php'),
        'agents'       => $agents,
        'agent_areas'  => $agent_areas,
        'area_stores'  => $area_stores,
        'pipe_options' => $pipe_options,
        'nonce'        => wp_create_nonce('cpi_form_nonce')
    ));

    $username = is_user_logged_in() ? wp_get_current_user()->display_name : 'NA';

    ob_start();
    ?>
    <div class="cpi-form-container">
        <h2>Pipe Inventory Form</h2>
        <form id="cpi-inventory-form">
            <input type="hidden" name="username" value="<?php echo esc_attr($username); ?>">

            <div class="form-group">
                <label>Agent Name</label>
                <select name="agent" id="cpi-agent" required>
                    <option value="">- Select -</option>
                    <?php foreach ($agents as $agent) : ?>
                        <option value="<?php echo esc_attr($agent); ?>"><?php echo esc_html($agent); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Area</label>
                <select name="area" id="cpi-area" required disabled>
                    <option value="">- Select Agent First -</option>
                </select>
            </div>

            <div class="form-group">
                <label>Store Name</label>
                <select name="store" id="cpi-store" required disabled>
                    <option value="">- Select Area First -</option>
                </select>
            </div>

            <div class="form-group">
                <label>Date</label>
                <input type="text" name="date" value="<?php echo esc_attr(date('d/m/Y')); ?>" readonly>
            </div>

            <div class="items-container">
                <div class="item-row">
                    <div class="form-group">
                        <label>Product Type</label>
                        <select name="pipe_type[]" class="cpi-pipe-type" required>
                            <option value="">- Select -</option>
                            <?php foreach (array_keys($pipe_options) as $type) : ?>
                                <option value="<?php echo esc_attr($type); ?>"><?php echo esc_html($type); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Size</label>
                        <select name="pipe_size[]" class="cpi-pipe-size" required disabled>
                            <option value="">- Select Product Type First -</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Length/Type</label>
                        <select name="length[]" class="cpi-length" required disabled>
                            <option value="">- Select Size First -</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Quantity/Notes</label>
                        <input type="text" name="quantity[]" value="1" required>
                    </div>

                    <div class="form-group row-actions">
                        <button type="button" class="add-row">+</button>
                        <button type="button" class="remove-row" disabled>-</button>
                    </div>
                </div>
            </div>

            <div class="form-submit">
                <button type="submit">Submit</button>
            </div>

            <div id="cpi-form-message"></div>
        </form>
    </div>
    <?php
    return ob_get_clean();
}

/** Helper: parse "Key: v1,v2" lines */
function cpi_parse_settings($setting) {
    $result = array();
    $lines = array_filter(array_map('trim', explode("\n", (string) $setting)));
    foreach ($lines as $line) {
        if (strpos($line, ':') !== false) {
            list($key, $values) = explode(':', $line, 2);
            $key = trim($key);
            $values = array_map('trim', explode(',', $values));
            $result[$key] = array_values(array_filter($values, 'strlen'));
        }
    }
    return $result;
}

/** Front-end AJAX: submission */
add_action('wp_ajax_cpi_submit_form', 'cpi_handle_submission');
add_action('wp_ajax_nopriv_cpi_submit_form', 'cpi_handle_submission');
function cpi_handle_submission() {
    global $wpdb;

    $form_access = get_option('cpi_form_access', 'public');
    if ($form_access === 'logged_in' && !is_user_logged_in()) {
        wp_send_json_error('You must be logged in to submit this form');
    }
    if (!isset($_POST['security']) || !wp_verify_nonce($_POST['security'], 'cpi_form_nonce')) {
        wp_send_json_error('Security check failed');
    }

    $required = array('agent', 'area', 'store', 'date');
    foreach ($required as $field) {
        if (empty($_POST[$field])) { wp_send_json_error("Missing required field: $field"); }
    }

    $date_str = sanitize_text_field(wp_unslash($_POST['date']));
    $submission = array(
        'username'        => !empty($_POST['username']) ? sanitize_text_field(wp_unslash($_POST['username'])) : 'NA',
        'agent'           => sanitize_text_field(wp_unslash($_POST['agent'])),
        'area'            => sanitize_text_field(wp_unslash($_POST['area'])),
        'store'           => sanitize_text_field(wp_unslash($_POST['store'])),
        'submission_date' => date('Y-m-d', strtotime(str_replace('/', '-', $date_str))),
        'status'          => 'New'
    );

    $types   = isset($_POST['pipe_type']) ? array_map(function($v){ return sanitize_text_field(wp_unslash($v)); }, (array) $_POST['pipe_type']) : array();
    $sizes   = isset($_POST['pipe_size']) ? array_map(function($v){ return sanitize_text_field(wp_unslash($v)); }, (array) $_POST['pipe_size']) : array();
    $lengths = isset($_POST['length'])    ? array_map(function($v){ return sanitize_text_field(wp_unslash($v)); }, (array) $_POST['length'])    : array();
    $qtys    = isset($_POST['quantity'])  ? array_map(function($v){ return sanitize_text_field(wp_unslash($v)); }, (array) $_POST['quantity'])  : array();

    $count = min(count($types), count($sizes), count($lengths), count($qtys));
    if ($count === 0) { wp_send_json_error('No items provided'); }

    $submissions_table = $wpdb->prefix . 'cpi_submissions';
    $items_table       = $wpdb->prefix . 'cpi_items';

    $wpdb->query('START TRANSACTION');

    try {
        $result = $wpdb->insert($submissions_table, $submission);
        if ($result === false) { throw new Exception('Failed to save submission'); }
        $submission_id = (int) $wpdb->insert_id;

        for ($i = 0; $i < $count; $i++) {
            $ok = $wpdb->insert($items_table, array(
                'submission_id' => $submission_id,
                'pipe_type'     => $types[$i],
                'pipe_size'     => $sizes[$i],
                'length'        => $lengths[$i],
                'quantity'      => $qtys[$i],
            ));
            if ($ok === false) { throw new Exception('Failed to save item'); }
        }

        $wpdb->query('COMMIT');
        wp_send_json_success('Submission saved successfully!');
    } catch (Exception $e) {
        $wpdb->query('ROLLBACK');
        error_log('Pipe Inventory Submission Error: ' . $e->getMessage());
        wp_send_json_error('Failed to save submission.');
    }
}

/** Admin AJAX: status audit */
add_action('wp_ajax_get_audit_history', 'cpi_get_audit_history');
function cpi_get_audit_history() {
    if (!current_user_can('manage_options')) { wp_send_json_error('Unauthorized'); }
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'cpi_admin_nonce')) {
        wp_send_json_error('Security check failed');
    }

    global $wpdb;
    $submission_id   = isset($_POST['submission_id']) ? (int) $_POST['submission_id'] : 0;
    $audit_log_table = $wpdb->prefix . 'cpi_audit_logs';

    $history = $wpdb->get_results($wpdb->prepare(
        "SELECT * FROM $audit_log_table WHERE submission_id = %d ORDER BY changed_at DESC", $submission_id
    ));

    ob_start(); ?>
    <table>
        <thead>
            <tr><th>Changed By</th><th>Field</th><th>Old Value</th><th>New Value</th><th>Changed At</th></tr>
        </thead>
        <tbody>
            <?php if (empty($history)) : ?>
                <tr><td colspan="5">No history found for this order</td></tr>
            <?php else : foreach ($history as $entry) : ?>
                <tr>
                    <td><?php echo esc_html($entry->changed_by); ?></td>
                    <td><?php echo esc_html($entry->changed_field); ?></td>
                    <td><?php echo esc_html(stripslashes($entry->old_value)); ?></td>
                    <td><?php echo esc_html(stripslashes($entry->new_value)); ?></td>
                    <td><?php echo esc_html(date('d/m/Y H:i', strtotime($entry->changed_at))); ?></td>
                </tr>
            <?php endforeach; endif; ?>
        </tbody>
    </table>
    <?php
    $content = ob_get_clean();
    wp_send_json_success($content);
}

/** Admin AJAX: items audit */
add_action('wp_ajax_get_items_audit', 'cpi_get_items_audit');
function cpi_get_items_audit() {
    if (!current_user_can('manage_options')) { wp_send_json_error('Unauthorized'); }
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'cpi_admin_nonce')) {
        wp_send_json_error('Security check failed');
    }

    global $wpdb;
    $submission_id     = isset($_POST['submission_id']) ? (int) $_POST['submission_id'] : 0;
    $items_audit_table = $wpdb->prefix . 'cpi_items_audit';

    $history = $wpdb->get_results($wpdb->prepare(
        "SELECT * FROM $items_audit_table WHERE submission_id = %d ORDER BY changed_at DESC", $submission_id
    ));

    ob_start(); ?>
    <table>
        <thead>
            <tr><th>Changed By</th><th>Changed At</th><th>Old Items</th><th>New Items</th></tr>
        </thead>
        <tbody>
            <?php if (empty($history)) : ?>
                <tr><td colspan="4">No item changes found for this order</td></tr>
            <?php else : foreach ($history as $entry) : ?>
                <tr>
                    <td><?php echo esc_html($entry->changed_by); ?></td>
                    <td><?php echo esc_html(date('d/m/Y H:i', strtotime($entry->changed_at))); ?></td>
                    <td>
                        <?php $old_items = array_filter(explode('; ', (string) $entry->old_items));
                        echo '<ul>'; foreach ($old_items as $item) { echo '<li>' . esc_html(stripslashes($item)) . '</li>'; } echo '</ul>'; ?>
                    </td>
                    <td>
                        <?php $new_items = array_filter(explode('; ', (string) $entry->new_items));
                        echo '<ul>'; foreach ($new_items as $item) { echo '<li>' . esc_html(stripslashes($item)) . '</li>'; } echo '</ul>'; ?>
                    </td>
                </tr>
            <?php endforeach; endif; ?>
        </tbody>
    </table>
    <?php
    $content = ob_get_clean();
    wp_send_json_success($content);
}

/** Admin AJAX: load items into Edit Items modal */
add_action('wp_ajax_get_order_items', 'cpi_get_order_items');
function cpi_get_order_items() {
    if (!current_user_can('manage_options')) { wp_send_json_error('Unauthorized'); }
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'cpi_admin_nonce')) {
        wp_send_json_error('Security check failed');
    }

    global $wpdb;
    $submission_id = isset($_POST['submission_id']) ? (int) $_POST['submission_id'] : 0;
    $items_table   = $wpdb->prefix . 'cpi_items';
    $items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $items_table WHERE submission_id = %d", $submission_id));

    $pipe_options = cpi_get_pipe_options();

    ob_start(); ?>
    <div class="item-rows">
        <?php foreach ($items as $item) : ?>
            <div class="item-row">
                <div class="form-group">
                    <label>Product Type</label>
                    <select name="pipe_type[]" class="cpi-pipe-type" required>
                        <option value="">- Select -</option>
                        <?php foreach (array_keys($pipe_options) as $type) : ?>
                            <option value="<?php echo esc_attr($type); ?>" <?php selected(stripslashes($item->pipe_type), $type); ?>>
                                <?php echo esc_html($type); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Size</label>
                    <select name="pipe_size[]" class="cpi-pipe-size" required>
                        <option value="">- Select -</option>
                        <?php if (isset($pipe_options[stripslashes($item->pipe_type)]['sizes'])) : ?>
                            <?php foreach ($pipe_options[stripslashes($item->pipe_type)]['sizes'] as $size) : ?>
                                <option value="<?php echo esc_attr($size); ?>" <?php selected(stripslashes($item->pipe_size), $size); ?>>
                                    <?php echo esc_html($size); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Length/Type</label>
                    <select name="length[]" class="cpi-length" required>
                        <option value="">- Select -</option>
                        <?php
                        $pt = stripslashes($item->pipe_type);
                        $ps = stripslashes($item->pipe_size);
                        if (isset($pipe_options[$pt]['lengths'][$ps])) :
                            foreach ($pipe_options[$pt]['lengths'][$ps] as $length) : ?>
                                <option value="<?php echo esc_attr($length); ?>" <?php selected(stripslashes($item->length), $length); ?>>
                                    <?php echo esc_html($length); ?>
                                </option>
                            <?php endforeach;
                        endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Quantity/Notes</label>
                    <input type="text" name="quantity[]" value="<?php echo esc_attr(stripslashes($item->quantity)); ?>" required>
                </div>

                <div class="form-group row-actions">
                    <button type="button" class="remove-row">-</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="form-group">
        <button type="button" id="add-item-row" class="button">+ Add Item</button>
    </div>
    <?php
    $content = ob_get_clean();
    wp_send_json_success($content);
}