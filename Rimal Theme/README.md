# Rimal Game WordPress Theme

A custom WordPress theme designed specifically for the Rimal Game, featuring a dark gaming aesthetic with support for custom post types, Elementor integration, and Advanced Custom Fields.

## 🎮 Features

- **Custom Post Types**: Heroes, Tribes, and Maps with dedicated templates
- **Elementor Support**: Full integration with Elementor page builder
- **Advanced Custom Fields**: Enhanced content management with ACF Pro
- **Responsive Design**: Mobile-first approach with modern CSS Grid and Flexbox
- **Dark Gaming Theme**: Custom color scheme optimized for gaming content
- **Performance Optimized**: Clean, semantic code with minimal dependencies
- **SEO Ready**: Built-in support for Yoast SEO
- **Custom Navigation**: Primary and footer menu locations
- **Widget Areas**: Footer widget areas for enhanced customization

## 🎨 Design System

### Color Palette
- **Primary**: `#c0392b` (Red)
- **Primary Light**: `#e74c3c`
- **Primary Dark**: `#992d22`
- **Accent**: `#8b4513` (Brown)
- **Background**: `#1a1a1a` (Dark)
- **Surface**: `#4a3f35` (Dark Brown)
- **Text**: `#ffffff` (White)
- **Text Muted**: `#d3d3d3` (Light Gray)

### Typography
- **Font Family**: Poppins, system fonts fallback
- **Responsive font sizes** with CSS custom properties
- **Optimized line heights** for readability

## 📋 Requirements

- **WordPress**: 5.9 or higher
- **PHP**: 7.4 or higher
- **Required Plugins**:
  - Advanced Custom Fields PRO (6.0+)
  - Elementor (3.0+)
- **Recommended Plugins**:
  - Yoast SEO (20.0+)

## 🚀 Installation

### Method 1: Manual Installation

1. Download the theme files
2. Upload the `rimal-theme` folder to `/wp-content/themes/`
3. Activate the theme in WordPress Admin → Appearance → Themes

### Method 2: Using Composer

```bash
composer install
```

The theme includes a `composer.json` file for dependency management.

## ⚙️ Setup

### 1. Install Required Plugins

After activating the theme, install and activate:
- Advanced Custom Fields PRO
- Elementor
- Yoast SEO (recommended)

### 2. Configure Menus

1. Go to **Appearance → Menus**
2. Create menus for:
   - Primary Menu (header navigation)
   - Footer Menu (footer navigation)

### 3. Set Up Custom Logo

1. Go to **Appearance → Customize → Site Identity**
2. Upload your logo (recommended size: 180px width)

### 4. Configure Widgets

1. Go to **Appearance → Widgets**
2. Add widgets to footer areas:
   - Footer Widget 1
   - Footer Widget 2
   - Footer Widget 3

## 🎯 Custom Post Types

### Heroes (`rimal_hero`)
- **Archive URL**: `/heroes/`
- **Single URL**: `/heroes/{hero-name}/`
- **Supports**: Title, Editor, Thumbnail, Excerpt
- **Custom Fields**: Hero Class, Hero Power (via ACF)

### Tribes (`rimal_tribe`)
- **Archive URL**: `/tribes/`
- **Single URL**: `/tribes/{tribe-name}/`
- **Supports**: Title, Editor, Thumbnail

### Maps (`rimal_map`)
- **Archive URL**: `/maps/`
- **Single URL**: `/maps/{map-name}/`
- **Supports**: Title, Editor, Thumbnail

## 🎨 Template Structure

```
rimal-theme/
├── assets/
│   └── images/
│       ├── hero-bg.jpg
│       ├── maps-bg.jpg
│       ├── rimal-logo.svg
│       └── tribes-bg.jpg
├── template-parts/
│   ├── archive-hero.php
│   ├── archive-map.php
│   ├── archive-tribe.php
│   ├── content-none.php
│   ├── content.php
│   ├── hero.php
│   ├── single-rimal_hero.php
│   ├── single-rimal_map.php
│   └── single-rimal_tribe.php
├── archive-rimal_hero.php
├── archive-rimal_map.php
├── archive-rimal_tribe.php
├── single-rimal_hero.php
├── single-rimal_map.php
├── single-rimal_tribe.php
├── header.php
├── footer.php
├── index.php
├── functions.php
└── style.css
```

## 🎮 Usage

### Creating Heroes

1. Go to **Heroes → Add New**
2. Add hero title and description
3. Set featured image
4. Configure custom fields:
   - Hero Class (e.g., "Warrior", "Mage")
   - Hero Power (e.g., "Fire Magic", "Sword Master")

### Creating Tribes

1. Go to **Tribes → Add New**
2. Add tribe information
3. Set featured image
4. Write tribe description

### Creating Maps

1. Go to **Maps → Add New**
2. Add map details
3. Set featured image
4. Describe map features

### Using with Elementor

The theme is fully compatible with Elementor:
- Use Elementor's theme builder for custom layouts
- All custom post types work with Elementor
- Theme locations are supported

## 🎨 Customization

### CSS Custom Properties

The theme uses CSS custom properties for easy customization:

```css
:root {
    --rimal-primary: #c0392b;
    --rimal-accent: #8b4513;
    --rimal-background: #1a1a1a;
    /* ... more variables */
}
```

### Adding Custom Styles

1. Create a child theme (recommended)
2. Or add custom CSS in **Appearance → Customize → Additional CSS**

### Hooks and Filters

The theme provides various WordPress hooks for customization:
- `rimal_theme_setup`
- `rimal_enqueue_scripts`
- Standard WordPress hooks

## 🔧 Development

### File Structure
- `functions.php` - Theme functionality and setup
- `style.css` - Main stylesheet with CSS custom properties
- `header.php` - Site header with navigation
- `footer.php` - Site footer with widgets
- `index.php` - Main template file

### Code Standards
- Follows WordPress Coding Standards
- PSR-4 autoloading with Composer
- Semantic HTML5 markup
- Modern CSS with custom properties
- Progressive enhancement approach

## 🐛 Troubleshooting

### Common Issues

**Theme not displaying correctly:**
- Ensure required plugins are installed and activated
- Check PHP version compatibility (7.4+)
- Verify WordPress version (5.9+)

**Custom post types not showing:**
- Go to **Settings → Permalinks** and click "Save Changes"
- Ensure ACF Pro is activated

**Elementor integration issues:**
- Update Elementor to latest version
- Check theme compatibility mode in Elementor settings

## 📝 Changelog

### Version 1.0.0
- Initial release
- Custom post types for Heroes, Tribes, and Maps
- Elementor integration
- ACF Pro support
- Responsive design
- Dark gaming theme

## 📄 License

This theme is licensed under the GNU General Public License v2 or later.

## 👨‍💻 Author

**Omar Helal**
- Website: [https://digitweb.io](https://digitweb.io)
- Theme URI: [https://digitweb.io/rimal-game](https://digitweb.io/rimal-game)

## 🤝 Support

For support and questions:
1. Check the troubleshooting section above
2. Review WordPress and plugin documentation
3. Contact the theme author through the official website

---

**Note**: This theme is specifically designed for the Rimal Game and includes custom functionality tailored to gaming content. Make sure to backup your site before installation and test in a staging environment first.