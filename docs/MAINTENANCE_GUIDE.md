# Maintenance Guide - FAESMA Website

## 1. Ongoing Maintenance

Maintaining the FAESMA website ensures long-term performance and security for the institutional portal.

### Daily Tasks
- **Review Contact Submissions**: Check the `contacts` table or the CMS (when implemented) for new messages.
- **Log Monitoring**: Review server error logs (Apache/PHP) for any recurring issues.

### Weekly Tasks
- **Database Backups**: Perform a full database export.
  ```bash
  mysqldump -u [user] -p faesma_db > backups/db_$(date +%F).sql
  ```
- **Integrity Check**: Test key flows like pre-enrollment and course filtering.

## 2. Content Updates

### Updating Courses
1. Access the database via API or management tool.
2. Update the `courses` table details.
3. If changing the `nome`, ensure the `slug` is also updated (or kept for SEO).
4. Refresh any static caches if implemented.

### Adding News/Events
- Add records to the `news` or `events` tables.
- Ensure `imagem_destaque` paths correspond to files uploaded in `uploads/news/` or `uploads/events/`.

## 3. Database Maintenance

### Table Optimization
Periodically run optimization commands to reclaim space:
```sql
OPTIMIZE TABLE courses, student_enrollments, news, events;
```

### Statistics
Monitor the growth of the `student_enrollments` table. If it exceeds 100k rows, consider archiving old data to a separate `history` table.

## 4. Troubleshooting

### Common Error: "Database connection failed"
- Verify that the database credentials in `config/config.php` are still valid.
- Check if the database host is reachable.

### Common Error: "404 Not Found"
- Ensure `.htaccess` is present and `mod_rewrite` is enabled.
- Verify that the `BASE_URL` in `config/config.php` correctly points to the current environment.

## 5. Scalability Adjustments

When scaling beyond 100 courses:
1. **Caching**: Implement a PHP caching layer (like APCu or Redis) for the `getCourses()` results.
2. **Media Storage**: Consider moving the `uploads/` directory to an S3-compatible object storage if disk space becomes an issue.
3. **Database**: Consider a master-slave replication if read traffic on courses becomes high during enrollment season.

---
**Version**: 1.0  
**Contact**: TI FAESMA Maintenance Team
