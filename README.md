# Efeedor - Quality Management System (QMS)

A comprehensive Quality Management System for healthcare institutions built with CodeIgniter 3 framework. This system helps hospitals and healthcare facilities manage quality audits, patient feedback, incidents, grievances, assets, and clinical pathways.

<<<<<<< HEAD
# Live Demo Details

Link : [https://demo.efeedor.com/]
username : demo@efeedor.com
password : Demo@123

=======
>>>>>>> 8992eb4c (changed)
## 🏥 Project Overview

Efeedor is a robust web-based Quality Management System designed specifically for healthcare organizations to streamline their quality assurance processes, manage patient feedback, track incidents, conduct audits, and maintain compliance with healthcare standards.

## ✨ Key Features

### 1. **Quality Management & Audits**
- Comprehensive quality audit modules (CQI - Continuous Quality Improvement)
- Multiple audit checklists for various hospital departments
- Quality benchmark tracking
- Audit frequency management
- Department-wise audit tracking

### 2. **Patient Management**
- **Inpatient (IPD) Management**
  - Patient admission and discharge tracking
  - 48-hour feedback collection
  - Patient status monitoring
  - Bed management
- **Outpatient (OPD) Management**
  - Outpatient feedback collection
  - Consultation time tracking
  - Patient flow management

### 3. **Clinical Pathways & Outcomes**
- Clinical pathway audits for various procedures:
  - Cardiac procedures (STEMI, Cardiac Arrest, Heart Transplant)
  - Surgical procedures (Laparoscopic, Arthroscopic, Whipple's Surgery)
  - Oncology procedures
  - Transplant procedures
  - And many more specialized pathways
- Clinical outcome tracking and analysis

### 4. **Incident Management**
- Incident reporting and tracking
- Incident categorization and prioritization
- Escalation management
- Incident analytics and reporting
- Mobile incident reporting support

### 5. **Grievance Management**
- Patient and employee grievance tracking
- Grievance resolution workflow
- Escalation system
- Department-wise grievance management

### 6. **Asset Management**
- Asset tracking and management
- Asset calibration records
- Asset warranty management
- Asset AMC (Annual Maintenance Contract) tracking
- Preventive maintenance scheduling
- Asset forms and documentation

### 7. **Analytics & Reporting**
- Comprehensive dashboard analytics
- Trend analysis
- PDF report generation
- Export capabilities
- Custom report generation
- Quality metrics visualization

### 8. **Infection Control**
- Hand hygiene compliance tracking
- Infection control audits
- Biomedical waste management
- CSSD (Central Sterile Services Department) audits
- Laboratory audits
- Canteen and linen audits

### 9. **Employee Service Request (ESR)**
- Employee service request management
- Ticket management system
- Department-wise ticket tracking
- Resolution tracking

### 10. **Mobile API Support**
- RESTful API endpoints for mobile applications
- Patient feedback collection via mobile
- Mobile incident reporting
- Mobile patient management

## 🛠️ Technology Stack

- **Framework**: CodeIgniter 3
- **Language**: PHP
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript, jQuery
- **Charts**: Custom chart libraries
- **PDF Generation**: Custom PDF library

## 📋 System Requirements

- PHP 5.6 or higher (PHP 7.x recommended)
- MySQL 5.6 or higher
- Apache/Nginx web server
- mod_rewrite enabled (for clean URLs)

## 🚀 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/YOUR_USERNAME/efeedor.git
   cd efeedor
   ```

2. **Configure Database**
   - Create a MySQL database
   - Update database credentials in `globalconfig.php` and `application/config/database.php`
   - Import the database schema (if provided)

3. **Configure Environment**
   - Update `env.php` with your environment settings
   - Configure base URL in `application/config/config.php`

4. **Set Permissions**
   ```bash
   chmod -R 755 application/cache
   chmod -R 755 application/logs
   ```

5. **Access the Application**
   - Navigate to your web server URL
   - Login with your credentials

## 📁 Project Structure

```
efeedor/
├── application/          # CodeIgniter application files
│   ├── controllers/     # Application controllers
│   ├── models/          # Database models
│   ├── views/           # View templates
│   ├── config/          # Configuration files
│   └── helpers/         # Helper functions
├── api/                 # API endpoints
├── assets/              # Static assets (CSS, JS, images)
├── system/              # CodeIgniter system files
├── index.php            # Entry point
├── globalconfig.php     # Global configuration
└── env.php              # Environment configuration
```

## 🔐 Security Notes

- **Important**: Before pushing to a public repository, ensure:
  - No sensitive credentials are hardcoded
  - Database passwords are in environment files (not committed)
  - API keys and secrets are properly secured
  - `.gitignore` is properly configured (already included)

## 📝 Modules Overview

### Quality Audit Modules
- **PSQ (Patient Safety & Quality)**: Multiple audit modules (PSQ3a, PSQ3b, PSQ3c, PSQ4c, PSQ4d, PSQ3d)
- **CQI (Continuous Quality Improvement)**: Extensive quality improvement tracking modules
- **CLOTCM**: Clinical outcome tracking modules

### Clinical Audit Modules
- Clinical pathway audits for various medical procedures
- Clinical outcome tracking
- Clinical KPI monitoring

### Administrative Modules
- User management
- Role-based access control
- Department management
- Ward management
- Employee management

## 🔄 API Endpoints

The system includes RESTful API endpoints for:
- Patient feedback collection
- Mobile incident reporting
- Patient information retrieval
- Ticket management
- Quality audit submissions

## 📊 Reporting Features

- Real-time dashboards
- Custom report generation
- PDF export functionality
- Excel export capabilities
- Trend analysis and visualization
- Analytics for all modules

## 🤝 Contributing

This is a private/public repository. Please follow standard contribution guidelines:
1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request

<<<<<<< HEAD

## 👥 Authors

SOORAJ TS

## 📞 Support

For support and queries, please contact [ sooraj114ts@gmail.com , 9562812784 ]
=======
## 📄 License

[Specify your license here - MIT, Proprietary, etc.]

## 👥 Authors

[Add author information]

## 📞 Support

For support and queries, please contact [your contact information]
>>>>>>> 8992eb4c (changed)

## 🔄 Version History

- **v7**: Current version with comprehensive QMS features
- See `changelogs.txt` for detailed change history

## 🌟 Key Highlights

- **Comprehensive**: Covers all aspects of hospital quality management
- **Scalable**: Modular architecture allows for easy expansion
- **User-Friendly**: Intuitive interface for healthcare professionals
- **Mobile-Ready**: API support for mobile applications
- **Compliant**: Designed to meet healthcare quality standards

---

**Note**: This is a production-ready Quality Management System designed for healthcare institutions. Ensure proper security measures are in place before deployment.
