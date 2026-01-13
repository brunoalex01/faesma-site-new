# FAESMA Website - Technical Documentation

## Overview

FAESMA (Faculdade Alcance de Ensino Superior do Maranhão) institutional website built with PHP, MySQL, HTML5, CSS3, and JavaScript. The system is designed to scale for 100+ courses and includes infrastructure for future ERP integration.

## Technology Stack

### Backend
- **PHP 7.4+**: Server-side programming language
- **MySQL 5.7+**: Relational database management system
- **PDO**: PHP Data Objects for database access with prepared statements

### Frontend
- **HTML5**: Semantic markup
- **CSS3**: Modern styling with custom properties (CSS variables)
- **JavaScript (ES6+)**: Client-side interactivity
- **Google Fonts**: Poppins font family

### Libraries & Tools
- **Font Awesome 6.4.0**: Icon library
- **Google Maps API**: Location embedding (optional)

## Project Structure 

```
projeto5/
├── config/
│   └── config.php              # Configuration file
├── includes/
│   ├── Database.php            # Database connection class
│   ├── functions.php           # Core utility functions
│   ├── header.php              # Common header template
│   └── footer.php              # Common footer template
├── assets/
│   ├── css/
│   │   └── style.css           # Main stylesheet
│   ├── js/
│   │   └── main.js             # Main JavaScript file
│   └── images/                 # Static images
├── uploads/
│   ├── courses/                # Course images
│   ├── news/                   # News images
│   └── events/                 # Event images
├── database/
│   ├── schema.sql              # Database schema
│   └── seed.sql                # Sample data
├── api/
│   ├── courses.php             # Courses API endpoint
│   ├── students.php            # Students API endpoint
│   └── enrollments.php         # Enrollments API endpoint
├── docs/
│   └── (documentation files)
├── index.php                   # Homepage
├── cursos.php                  # Courses listing
├── curso-detalhes.php          # Course details
├── sobre.php                   # About page
├── vestibular.php              # Admissions page
├── contato.php                 # Contact page
├── noticias.php                # News listing
├── eventos.php                 # Events listing
├── privacidade.php             # Privacy policy
└── .htaccess                   # Apache configuration
```

## Brand Identity

### Colors
- **Primary**: `#0d0158` - Deep purple for main elements
- **Secondary**: `#008125` - Green for CTAs and accents
- **Accent**: `#5ce1e6` - Cyan for highlights and details
- **Neutral**: White (`#ffffff`) and Black (`#000000`) for text

### Typography
- **Font Family**: Poppins (Google Fonts)
- **Weights**: 300 (Light), 400 (Regular), 500 (Medium), 600 (Semi-Bold), 700 (Bold), 800 (Extra-Bold)

## Core Components

### 1. Configuration (`config/config.php`)

Central configuration file containing:
- Database credentials
- File paths and URLs
- Site settings
- Brand colors
- Security settings
- Pagination limits

**Important**: Update database credentials for production environment.

### 2. Database Class (`includes/Database.php`)

Singleton pattern database connection class using PDO.

**Key Features**:
- Prepared statements for SQL injection prevention
- Connection pooling
- Error handling with development/production modes
- Transaction support

**Usage Example**:
```php
$db = Database::getInstance();
$courses = $db->fetchAll("SELECT * FROM courses WHERE status = :status", [':status' => 'ativo']);
```

### 3. Core Functions (`includes/functions.php`)

Comprehensive utility functions library:

**Course Functions**:
- `getCourses()` - Retrieve courses with filtering
- `getCourse()` - Get single course
- `getCourseCurriculum()` - Get course curriculum
- `getCourseCount()` - Count courses
- `getCourseCategories()` - Get categories
- `getCourseModalities()` - Get modalities

**Content Functions**:
- `getNews()` - Retrieve news articles
- `getEvents()` - Retrieve events
- `getPage()` - Get static page content

**Form Functions**:
- `saveContact()` - Save contact form submissions

**Security Functions**:
- `sanitize()` - Sanitize user input
- `validateEmail()` - Email validation
- `validateCPF()` - Brazilian CPF validation
- `generateCSRFToken()` - CSRF token generation
- `verifyCSRFToken()` - CSRF token verification

**Helper Functions**:
- `formatCurrency()` - Format Brazilian Real
- `formatDate()` - Format dates
- `truncateText()` - Text truncation
- `generateSlug()` - URL-friendly slug generation

## Frontend Architecture

### CSS Design System (`assets/css/style.css`)

Modern, component-based CSS architecture:

**CSS Custom Properties**:
```css
--color-primary: #0d0158;
--color-secondary: #008125;
--color-accent: #5ce1e6;
--spacing-sm: 1rem;
--radius-md: 8px;
--shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
```

**Key Components**:
- Responsive grid system (2, 3, 4 columns)
- Card components with hover effects
- Button system (primary, secondary, outline, sizes)
- Form controls with validation states
- Navigation (desktop and mobile)
- Footer layout

**Responsive Breakpoints**:
- Desktop: > 992px
- Tablet: 768px - 992px
- Mobile: < 768px

### JavaScript (`assets/js/main.js`)

Interactive features:

- **Mobile Menu**: Hamburger menu toggle
- **Form Validation**: Client-side validation with Brazilian formats
- **Smooth Scrolling**: Anchor link smooth scrolling
- **Back to Top**: Floating button
- **Input Formatting**: Phone and CPF auto-formatting
- **Lazy Loading**: Progressive image loading
- **Animations**: Intersection Observer for scroll animations

## Security Implementations

### 1. SQL Injection Prevention
- All database queries use PDO prepared statements
- User input is parameterized, never concatenated

### 2. XSS Protection
- All output is escaped using `htmlspecialchars()`
- User-generated content is sanitized before storage

### 3. CSRF Protection
- Token generation for forms (ready for implementation)
- `verifyCSRFToken()` function available

### 4. Input Validation
- Server-side validation for all forms
- Email and CPF format validation
- Required field checking

### 5. Access Control
- Direct access prevention in included files using `FAESMA_ACCESS` constant
- Session security settings in config

## Database Optimization

### Indexing Strategy

The database is optimized for 100+ courses:

1. **Primary Keys**: Auto-increment on all tables
2. **Foreign Keys**: Proper relationships with ON DELETE constraints
3. **Standard Indexes**:
   - `courses.slug` - Fast course lookup by URL
   - `courses.status` - Filter active courses
   - `courses. category_id` - Category filtering
   - `courses.modality_id` - Modality filtering
   - `courses.destaque` - Featured courses query

4. **Full-Text Indexes**:
   - `courses(nome, descricao_curta, descricao_completa)` - Search functionality
   - `news(titulo, resumo, conteudo)` - News search

### Query Optimization

**Example optimized query**:
```sql
-- Uses indexes on category_id, status, and ordem
SELECT c.*, cat.nome as categoria_nome, mod.nome as modalidade_nome
FROM courses c
INNER JOIN course_categories cat ON c.category_id = cat.id
INNER JOIN course_modalities mod ON c.modality_id = mod.id
WHERE c.category_id = ? AND c.status = 'ativo'
ORDER BY c.ordem ASC, c.nome ASC
LIMIT 12 OFFSET 0;
```

## Performance Considerations

### 1. Database Connection
- Single PDO connection using singleton pattern
- Connection reuse across page lifecycle

### 2. Pagination
- Limit queries to `ITEMS_PER_PAGE` (default: 12)
- Offset-based pagination for large datasets

### 3. Asset Optimization
- CSS: Single minified file (production)
- JavaScript: Event delegation for dynamic elements
- Images: Lazy loading with Intersection Observer

### 4. Caching Strategy (Recommendations)
- Static page content: Cache in PHP variables or Redis
- Database queries: Implement query result caching
- Assets: Browser caching via `.htaccess`

## API Endpoints (ERP Integration Ready)

API endpoints are structured for future ERP integration:

### Base URL
```
https://yourdomain.com/api/
```

### Endpoints

#### 1. Courses API (`api/courses.php`)
```
GET /api/courses.php
GET /api/courses.php?id=1
POST /api/courses.php (create - ERP only)
PUT /api/courses.php (update - ERP only)
DELETE /api/courses.php (delete - ERP only)
```

#### 2. Students API (`api/students.php`)
```
GET /api/students.php
GET /api/students.php?cpf=12345678901
POST /api/students.php
```

#### 3. Enrollments API (`api/enrollments.php`)
```
GET /api/enrollments.php?student_id=1
POST /api/enrollments.php
```

**Note**: Full API implementation pending ERP vendor requirements.

## Deployment

### Requirements
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache 2.4 with mod_rewrite enabled
- 512MB RAM minimum
- 1GB disk space minimum

### Installation Steps

1. **Upload Files**: Transfer all files to web server
2. **Configure Database**: Update `config/config.php` with credentials
3. **Create Database**: Import `database/schema.sql`
4. **Import Sample Data**: Import `database/seed.sql` (optional)
5. **Set Permissions**:
   ```bash
   chmod 755 uploads/
   chmod 755 uploads/courses/
   chmod 755 uploads/news/
   chmod 755 uploads/events/
   ```
6. **Enable mod_rewrite**: Ensure `.htaccess` is processed
7. **Test**: Access site and verify functionality

### Production Checklist
- [ ] Update database credentials in `config/config.php`
- [ ] Set `DEVELOPMENT_MODE` to `false`
- [ ] Configure error logging path
- [ ] Enable HTTPS
- [ ] Set up regular database backups
- [ ] Configure email settings for contact form
- [ ] Minify CSS and JavaScript
- [ ] Optimize images

## Maintenance

### Regular Tasks
- **Daily**: Monitor error logs
- **Weekly**: Review contact form submissions
- **Monthly**: Database backup
- **Quarterly**: Update content (news, events)
- **Annually**: Review and update course information

### Backup Strategy
1. **Database**: Daily automated MySQL dump
2. **Files**: Weekly backup of `uploads/` directory
3. **Code**: Version control (Git recommended)

## Troubleshooting

### Common Issues

**1. Database Connection Error**
- Check credentials in `config/config.php`
- Verify MySQL service is running
- Confirm database exists

**2. Images Not Displaying**
- Verify `uploads/` directory permissions (755)
- Check image paths in database
- Confirm BASE_URL is correct

**3. Forms Not Submitting**
- Check PHP error logs
- Verify form action URLs
- Ensure database tables exist

**4. Mobile Menu Not Working**
- Verify JavaScript is loading
- Check console for errors
- Ensure jQuery is not conflicting

## Future Enhancements

### Phase 1 (Next 3 months)
- Student portal for enrolled students
- Online payment integration
- Document upload system

### Phase 2 (3-6 months)
- ERP system integration
- Virtual classroom integration
- Mobile app development

### Phase 3 (6-12 months)
- Analytics dashboard
- A/B testing framework
- Multi-language support

## Support

For technical support or questions about this project:
- **Email**: dev@faesma.edu.br
- **Documentation**: See `/docs` directory
- **Code Issues**: Review inline comments in source files

---

**Version**: 1.0  
**Last Updated**: January 2026  
**Author**: FAESMA Development Team
