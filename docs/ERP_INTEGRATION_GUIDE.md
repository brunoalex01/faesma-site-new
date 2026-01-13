# ERP Integration Guide - FAESMA Website

## Overview

This guide outlines the strategy for integrating the FAESMA institutional website with future ERP (Enterprise Resource Planning) systems. The website is designed with an API-first mindset, allowing for seamless synchronization of data between the web portal and the institution's management software.

## Integration Architecture

The integration follows a "Sync Interface" pattern where the ERP acts as the source of truth for academic and financial data, while the website provides the interface for prospective and current students.

### Communication Flow

1. **ERP to Website (Pull/Push)**:
   - Course offerings and updates
   - Enrollment status updates
   - Grade and attendance data (future Student Portal)
   - Financial boleto generation

2. **Website to ERP (Push)**:
   - New lead/contact information
   - Pre-enrollment applications (Vestibular)
   - Online payment confirmations

## API Infrastructure

The website includes a dedicated `api/` directory designed to handle RESTful requests. 

### Security Layer

All integration must be secured using:
- **API Keys**: Unique keys for each integrating system.
- **HTTPS**: All communication must be encrypted.
- **IP Whitelisting**: Restrict API access to known ERP server IPs.
- **Rate Limiting**: Prevent DOS attacks on the integration endpoints.

## Integration Endpoints

### 1. Courses Integration (`api/courses.php`)

Used to sync course details, availability, and pricing.

**Example Payload (ERP -> Website):**
```json
{
  "action": "sync_course",
  "course_id": "ADM-001",
  "name": "Administração",
  "modality": "presencial",
  "tuition_fee": 450.00,
  "slots": 50,
  "status": "ativo"
}
```

### 2. Leads & Enrollments (`api/enrollments.php`)

Used to push registrations from the website to the ERP.

**Example Payload (Website -> ERP):**
```json
{
  "student_name": "João Silva",
  "cpf": "12345678901",
  "email": "joao@email.com",
  "course_id": "ADM-001",
  "entry_method": "vestibular_online",
  "timestamp": "2026-01-04T10:00:00Z"
}
```

## Recommended Sync Strategies

### Real-time Integration
Use **Webhooks** for critical events:
- Contact form submissions
- Enrollment applications
- Payment confirmations

### Batch Synchronization
Use **Cron Jobs** for less critical data:
- Nightly course inventory updates
- Weekly student status synchronization
- News and events updates from internal departments

## Implementation Steps for ERP Vendors

1. **Request API Credentials**: Contact the IT department for an API Key and Secret.
2. **Review Endpoints**: Consult the specific API documentation for each endpoint.
3. **Sandbox Testing**: Perform tests in the `development` environment by setting `DEVELOPMENT_MODE` to `true` in `config/config.php`.
4. **Data Mapping**: Align ERP course IDs and student statuses with the website's database schema.
5. **Live Deployment**: Move to production and monitor logs for sync errors.

## Future Projections: Student Portal

When the full Student Portal is developed, the following integrations will be required:
- **SAML/OAuth2**: Single Sign-On (SSO) between the website and ERP.
- **Grades API**: Real-time grade display from the academic module.
- **Financial API**: Direct payment link generation and status tracking.

---

**Version**: 1.0  
**Status**: Ready for Implementation  
**Contact**: TI FAESMA (ti@faesma.edu.br)
