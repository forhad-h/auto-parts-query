<?php
namespace APQ\Inc;

/**
 * class Utils
 * Utility methods
 * @since 1.0.0
*/

class Utils {
  /**
   * Check for valid admin user
  */
  public static function is_valid_admin() {
    return (is_admin() && is_user_logged_in() && current_user_can( 'manage_options' ));
  }
}
