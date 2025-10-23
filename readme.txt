# Post Slider Plugin

Simple WordPress plugin for displaying posts in slider format with 3 different styles.

## 📦 Installation

### Method 1: Upload via WordPress Admin
1. Download the plugin folder
2. Zip the folder: `post-slider-plugin.zip`
3. Go to WordPress Admin > Plugins > Add New > Upload Plugin
4. Upload the zip file
5. Activate the plugin

### Method 2: Manual Installation
1. Upload the `post-slider-plugin` folder to `/wp-content/plugins/`
2. Go to WordPress Admin > Plugins
3. Activate "Post Slider"

## 🚀 Usage

Use the shortcode in any post or page:

```
[post_slider]
```

## 🎨 Styles

### 1. Card 1 (Default)
Full width card with image on left and content on right.

```
[post_slider style="card1"]
```

**Features:**
- Image + content split layout
- Auto slide every 5 seconds
- Pagination dots
- Responsive design

---

### 2. Card 2
3 cards displayed horizontally with navigation.

```
[post_slider style="card2"]
```

**Features:**
- Shows 3 cards at once (desktop)
- Previous/Next navigation
- Responsive (2 cards on tablet, 1 on mobile)
- Hover effects

---

### 3. List
Sidebar list with big image slider.

```
[post_slider style="list"]
```

**Features:**
- Dark theme with sidebar
- Click sidebar items to change slide
- Auto slide with overlay effect
- Professional look

## ⚙️ Parameters

| Parameter | Default | Description | Values |
|-----------|---------|-------------|--------|
| `style` | card1 | Slider style | card1, card2, list |
| `category` | (all) | Category slug | any-category-slug |
| `posts_per_page` | 5 | Number of posts | 1-100 |
| `title` | Latest Posts | Slider title | any text |
| `order` | DESC | Sort order | ASC, DESC |
| `orderby` | date | Order by | date, title, rand |

## 📝 Examples

### Basic Usage
```
[post_slider]
```

### Card 1 with Custom Title
```
[post_slider style="card1" title="Featured Posts"]
```

### Card 2 with Category
```
[post_slider style="card2" category="news" title="Latest News" posts_per_page="9"]
```

### List Style with Random Order
```
[post_slider style="list" orderby="rand" posts_per_page="6" title="Trending"]
```

### Full Parameters
```
[post_slider 
    style="card2" 
    category="technology" 
    posts_per_page="12" 
    title="Tech Articles" 
    order="DESC" 
    orderby="date"
]
```

## 🎯 Use Cases

### Homepage
```
[post_slider style="list" category="featured" title="Top Stories" posts_per_page="5"]
```

### Sidebar (if theme supports shortcode in widgets)
```
[post_slider style="card1" posts_per_page="3"]
```

### Category Page
```
[post_slider style="card2" category="tutorials" title="Latest Tutorials" posts_per_page="9"]
```

### In PHP Template
```php
<?php echo do_shortcode('[post_slider style="card2" posts_per_page="9"]'); ?>
```

## 📱 Responsive

All styles are fully responsive:

- **Desktop**: Full features
- **Tablet**: Card 2 shows 2 cards, others adapt
- **Mobile**: All styles show 1 item, optimized layout

## 🎨 Customization

### Change Accent Color (List Style)
Edit `includes/styles.php` and find:
```css
background-color: #00d9ff;
```
Replace `#00d9ff` with your color.

### Change Auto Slide Duration
Edit main plugin file, find:
```javascript
setInterval(function() {
    // ...
}, 5000); // Change 5000 (5 seconds)
```

## ⚠️ Requirements

- WordPress 5.0 or higher
- PHP 7.0 or higher
- Posts with featured images (recommended)

## 💡 Tips

1. **Featured Images**: Always set featured images for best results
2. **Performance**: Limit `posts_per_page` to 12 or less
3. **Spacing**: Use HTML between multiple sliders:
   ```html
   [post_slider style="card1"]
   
   <div style="height: 60px;"></div>
   
   [post_slider style="card2"]
   ```
4. **Category Slug**: Use slug (lowercase, hyphenated) not category name
   - ✅ Correct: `category="latest-news"`
   - ❌ Wrong: `category="Latest News"`

## 🐛 Troubleshooting

### Shortcode appears as text
- Make sure plugin is activated
- Clear WordPress cache
- Check for PHP errors

### Styles not working
- Clear browser cache
- Check if shortcode is in post content
- Verify plugin files are uploaded correctly

### Images not showing
- Set featured images for posts
- Check image permissions
- Verify image URLs are accessible

### Slider not sliding
- Check JavaScript console for errors
- Disable other plugins to check for conflicts
- Ensure jQuery is loaded (if needed)

## 📚 Documentation

### Shortcode in Different Contexts

**Gutenberg Editor:**
1. Add "Shortcode" block
2. Paste shortcode

**Classic Editor:**
1. Paste shortcode directly

**Page Builders (Elementor, etc):**
1. Add shortcode widget/element
2. Paste shortcode

**Template Files:**
```php
<?php
if (function_exists('do_shortcode')) {
    echo do_shortcode('[post_slider style="card2"]');
}
?>
```

**Widgets (if theme supports):**
1. Go to Appearance > Widgets
2. Add "Text" widget
3. Paste shortcode

## 🔄 Updates

**Version 1.0.0**
- Initial release
- 3 slider styles
- Shortcode support
- Responsive design

## 📄 License

GPL v2 or later

## 👨‍💻 Support

For support or feature requests, please contact the plugin author.

## 🌟 Features

✅ 3 unique slider styles  
✅ Fully responsive  
✅ Auto slide support  
✅ Manual navigation  
✅ Category filtering  
✅ Custom titles  
✅ SEO friendly  
✅ Fast loading  
✅ No jQuery dependency  
✅ Easy to use shortcode  
✅ Multiple sliders per page  
✅ Touch/swipe support  

## 🎉 Enjoy!

Happy blogging with Post Slider Plugin!
