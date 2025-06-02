<?php
class ModelToolDeveloper extends Model {

	public function clearDemoData()
	{
		$delete_catalog_data = [
			'product',
			'category',
			'attribute',
			'manufacturer',
			'review'
		];
		foreach ($delete_catalog_data as $type)
		{
			$this->load->model('catalog/'.$type);
			$all_data = $this->db->query("SELECT {$type}_id FROM " . DB_PREFIX . "$type WHERE 1");
			foreach ($all_data->rows as $row){
				$this->{'model_catalog_'.$type}->{'delete'.ucfirst($type)}($row[$type.'_id']);
			}
		}

		$tables_to_truncate = [
			DB_PREFIX . "_seo_blog_article",
			DB_PREFIX . "_seo_blog_article_description",
			DB_PREFIX . "_seo_blog_article_related_article",
			DB_PREFIX . "_seo_blog_article_related_product",
			DB_PREFIX . "_seo_blog_article_to_category",
			DB_PREFIX . "_seo_blog_article_to_layout",
			DB_PREFIX . "_seo_blog_article_to_store",
			DB_PREFIX . "_seo_blog_author",
			DB_PREFIX . "_seo_blog_author_description",
			DB_PREFIX . "_seo_blog_category",
			DB_PREFIX . "_seo_blog_category_description",
			DB_PREFIX . "_seo_blog_category_path",
			DB_PREFIX . "_seo_blog_category_to_layout",
			DB_PREFIX . "_seo_blog_category_to_store",
			DB_PREFIX . "_seo_blog_comment",
			DB_PREFIX . "_seo_category_to_blog_article",
			DB_PREFIX . "_category_filter",
			DB_PREFIX . "_filter",
			DB_PREFIX . "_filter_cache",
			DB_PREFIX . "_filter_category_cache",
			DB_PREFIX . "_filter_description",
			DB_PREFIX . "_filter_group",
			DB_PREFIX . "_filter_group_description",
			DB_PREFIX . "_filter_module_cache",
			DB_PREFIX . "_filter_option",
			DB_PREFIX . "_filter_option_description",
			DB_PREFIX . "_filter_option_to_category",
			DB_PREFIX . "_filter_option_to_manufacturer",
			DB_PREFIX . "_filter_option_value",
			DB_PREFIX . "_filter_option_value_description",
			DB_PREFIX . "_filter_option_value_to_product",
			DB_PREFIX . "_filter_page",
			DB_PREFIX . "_filter_page_description",
			DB_PREFIX . "_filter_page_generator",
			DB_PREFIX . "_product_filter",
			DB_PREFIX . "_order",
			DB_PREFIX . "_order_history",
			DB_PREFIX . "_order_option",
			DB_PREFIX . "_order_product",
			DB_PREFIX . "_order_recurring",
			DB_PREFIX . "_order_recurring_transaction",
			DB_PREFIX . "_order_scfield",
			DB_PREFIX . "_order_shipment",
			DB_PREFIX . "_order_status",
			DB_PREFIX . "_order_total",
			DB_PREFIX . "_order_to_1c",
			DB_PREFIX . "_order_voucher",
			DB_PREFIX . "_order_warehouse",
			DB_PREFIX . "_customer",
			DB_PREFIX . "_customer_activity",
			DB_PREFIX . "_customer_affiliate",
			DB_PREFIX . "_customer_approval",
			DB_PREFIX . "_customer_history",
			DB_PREFIX . "_customer_ip",
			DB_PREFIX . "_customer_login",
			DB_PREFIX . "_customer_online",
			DB_PREFIX . "_customer_reward",
			DB_PREFIX . "_customer_scfield",
			DB_PREFIX . "_customer_search",
			DB_PREFIX . "_customer_to_1c",
			DB_PREFIX . "_customer_transaction",
			DB_PREFIX . "_customer_wishlist",
			DB_PREFIX . "_tax_rate_to_customer_gro",

		];
		foreach ($tables_to_truncate as $table_name){
			$check = $this->db->query("SHOW TABLES LIKE '$table_name'");
			if($check->num_rows){
				$this->db->query("TRUNCATE $table_name");
			}
		}
	}
}
