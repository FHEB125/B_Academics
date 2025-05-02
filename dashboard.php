</style>
</head>
<body>
  <div class="dashboard">
    <header>
      <h1>CICS Consultation</h1>
      <button aria-label="Toggle menu" id="menu-toggle">&#9776;</button>
    </header>

    <nav class="sidebar" id="sidebar">
      <a href="#" class="active">Dashboard</a>
      <a href="#">Schedule</a>
      <a href="#">Student Records</a>
      <a href="#">Advisors</a>
      <a href="#">Settings</a>
      <a href="#">Logout</a>
    </nav>

      <section class="stats" aria-label="Consultation statistics">
        <article class="stat-card" role="region" aria-labelledby="stat-pending">
          <h3 id="stat-pending">8</h3>
          <p>Pending Consultations</p>
        </article>
        <article class="stat-card" role="region" aria-labelledby="stat-completed">
          <h3 id="stat-completed">15</h3>
          <p>Completed Consultations</p>
        </article>
        <article class="stat-card" role="region" aria-labelledby="stat-upcoming">
          <h3 id="stat-upcoming">5</h3>
          <p>Upcoming Consultations</p>
        </article>
        <article class="stat-card" role="region" aria-labelledby="stat-students">
          <h3 id="stat-students">120</h3>
          <p>Active Students</p>
        </article>
      </section>

      <section class="consultations" aria-label="Upcoming consultations">
        <h2>Upcoming Consultations</h2>
        <div class="consult-item" tabindex="0">
          <div class="consult-info">
            <span class="name">John Dela Cruz</span>
            <span class="topic">Course Planning</span>
          </div>
          <div class="consult-time" aria-label="Date and time">Feb 11, 10:00 AM</div>
        </div>
        <div class="consult-item" tabindex="0">
          <div class="consult-info">
            <span class="name">Anna Santos</span>
            <span class="topic">Thesis Guidance</span>
          </div>
          <div class="consult-time" aria-label="Date and time">Feb 12, 2:00 PM</div>
        </div>
        <div class="consult-item" tabindex="0">
          <div class="consult-info">
            <span class="name">Carlos Reyes</span>
            <span class="topic">Internship Advice</span>
          </div>
          <div class="consult-time" aria-label="Date and time">Feb 14, 9:00 AM</div>
        </div>
        <div class="consult-item" tabindex="0">
          <div class="consult-info">
            <span class="name">Maria Lopez</span>
            <span class="topic">Exam Preparation</span>
          </div>
          <div class="consult-time" aria-label="Date and time">Feb 15, 11:00 AM</div>
        </div>
        <div class="consult-item" tabindex="0">
          <div class="consult-info">
            <span class="name">Juan dela Vega</span>
            <span class="topic">Research Help</span>
          </div>
          <div class="consult-time" aria-label="Date and time">Feb 16, 1:30 PM</div>
        </div>
      </section>

      <section class="actions" aria-label="Quick actions">
        <button class="action-btn" id="btn-schedule" aria-label="Schedule a consultation">
          &#43; Schedule Consultation
        </button>
        <button class="action-btn" id="btn-view-students" aria-label="View student records">
          &#128214; View Students
        </button>
      </section>

      <section class="profile" aria-label="User profile">
        <img src="https://images.pexels.com/photos/1181406/pexels-photo-1181406.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=100" alt="User Profile Picture"/>
        <div class="profile-info">
          <div class="name">Dr. Alice Mendoza</div>
          <div class="role">Academic Advisor</div>
        </div>
      </section>
    </main>
  </div>

  <script>
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');

    menuToggle.addEventListener('click', () => {
      sidebar.classList.toggle('hide');
    });

    // Close sidebar on clicking links (mobile)
    const navLinks = sidebar.querySelectorAll('a');
    navLinks.forEach(link => {
      link.addEventListener('click', () => {
        if(window.innerWidth <= 600) {
          sidebar.classList.add('hide');
        }
      });
    });

    // Prevent main scroll on desktop but allow in main
    // Handled by CSS overflow-y:auto in main

  </script>
</body>
</html>

