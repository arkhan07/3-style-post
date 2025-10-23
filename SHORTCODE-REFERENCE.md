# POST SLIDER - QUICK REFERENCE

## 🎨 3 STYLES

### 1. CARD1 (Full Width Image + Content)
```
[post_slider style="card1"]
```

### 2. CARD2 (3 Cards Horizontal)
```
[post_slider style="card2"]
```

### 3. LIST (Sidebar + Big Image)
```
[post_slider style="list"]
```

---

## ⚙️ PARAMETERS

```
[post_slider 
    style="card1"              ← card1 | card2 | list
    category="news"            ← category slug
    posts_per_page="5"         ← number (1-100)
    title="Latest Posts"       ← your title
    order="DESC"               ← ASC | DESC
    orderby="date"             ← date | title | rand
]
```

---

## 📋 READY TO USE EXAMPLES

### Homepage Hero
```
[post_slider style="list" category="featured" title="Top Stories" posts_per_page="5"]
```

### Blog Section
```
[post_slider style="card2" category="articles" title="Latest Articles" posts_per_page="9"]
```

### Sidebar Widget
```
[post_slider style="card1" posts_per_page="3"]
```

### Related Posts
```
[post_slider style="card1" category="tutorials" title="Related Tutorials" posts_per_page="3"]
```

### Random Posts
```
[post_slider style="card2" orderby="rand" title="You Might Like" posts_per_page="6"]
```

### Multiple Categories
```
[post_slider style="list" category="news" title="Latest News" posts_per_page="6"]
[post_slider style="card2" category="blog" title="From Our Blog" posts_per_page="9"]
```

---

## 💡 TIPS

✅ Set featured images for all posts
✅ Use category **slug** not name (check Posts > Categories)
✅ Keep posts_per_page under 12 for performance
✅ Card2 works best with multiples of 3 (6, 9, 12)
✅ Test on mobile after adding slider

---

## 🚀 IN PHP TEMPLATES

```php
<?php echo do_shortcode('[post_slider style="card2" posts_per_page="9"]'); ?>
```

---

## 📱 RESPONSIVE

- **Desktop**: Full features
- **Tablet**: Card2 shows 2 cards
- **Mobile**: All styles show 1 card

---

## 🎯 STYLE COMPARISON

| Feature | Card1 | Card2 | List |
|---------|-------|-------|------|
| Layout | Full width split | 3 cards | Sidebar + image |
| Best for | Featured posts | Multiple items | Hero section |
| Auto slide | ✅ Yes | ❌ No | ✅ Yes |
| Pagination | Dots | Arrows | Dots + Arrows |
| Theme | Light | Light | Dark |

---

## ⚡ QUICK START

1. Install & activate plugin
2. Add shortcode to post/page:
   ```
   [post_slider]
   ```
3. Done! 🎉

---

## 📞 NEED HELP?

Check `readme.txt` for full documentation.
