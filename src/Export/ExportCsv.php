<?php

namespace NFES_Newsletter\Core\Export;

use NFES_Newsletter\Core\Export\Export;

class ExportCsv extends Export
{
    public static function export_data()
    {
        if ($subscribers_data = parent::get_subscribers_data()) {
            self::make_directory();
            $file_name = parent::make_file();
            fputcsv($file_name, parent::DATA);
            foreach ($subscribers_data as $subscriber) {
                fputcsv($file_name, $subscriber);
            }
            fclose($file_name);

            set_transient(
                'export_data_result',
                [
                    'text' => __('Eksport wykonany', 'newsletterplugin'),
                    'type' => 'success'
                ],
                600
            );
            echo "<script>location.href = '/wp-admin/admin.php?page=nfes_settings_export';</script>";
        } else {
            set_transient(
                'export_data_result',
                [
                    'text' => __('Brak subskrybentów do eksportu', 'newsletterplugin'),
                    'type' => 'error'
                ],
                600
            );
            echo "<script>location.href = '/wp-admin/admin.php?page=nfes_settings_export';</script>";
        }
    }
}
