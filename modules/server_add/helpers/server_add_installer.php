<?php defined("SYSPATH") or die("No direct script access.");
/**
 * Gallery - a web based photo album viewer and editor
 * Copyright (C) 2000-2009 Bharat Mediratta
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street - Fifth Floor, Boston, MA  02110-1301, USA.
 */
class server_add_installer {
  static function install() {
    $db = Database::instance();
    $version = module::get_version("server_add");
    if ($version == 0) {
      access::register_permission("server_add", t("Add files from server"));
      module::set_version("server_add", 1);
    }
    server_add::check_config();
  }

  static function uninstall() {
    access::delete_permission("server_add");
    module::delete("server_add");
    site_status::clear("server_add_configuration");
  }
}
