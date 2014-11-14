
Name: app-system-report
Epoch: 1
Version: 1.6.7
Release: 1%{dist}
Summary: System Report
License: GPLv3
Group: ClearOS/Apps
Source: %{name}-%{version}.tar.gz
Buildarch: noarch
Requires: %{name}-core = 1:%{version}-%{release}
Requires: app-base

%description
The System Report provides information on the operating system and underlying hardware.

%package core
Summary: System Report - Core
License: LGPLv3
Group: ClearOS/Libraries
Requires: app-base-core
Requires: app-reports-core >= 1:1.4.3

%description core
The System Report provides information on the operating system and underlying hardware.

This package provides the core API and libraries.

%prep
%setup -q
%build

%install
mkdir -p -m 755 %{buildroot}/usr/clearos/apps/system_report
cp -r * %{buildroot}/usr/clearos/apps/system_report/


%post
logger -p local6.notice -t installer 'app-system-report - installing'

%post core
logger -p local6.notice -t installer 'app-system-report-core - installing'

if [ $1 -eq 1 ]; then
    [ -x /usr/clearos/apps/system_report/deploy/install ] && /usr/clearos/apps/system_report/deploy/install
fi

[ -x /usr/clearos/apps/system_report/deploy/upgrade ] && /usr/clearos/apps/system_report/deploy/upgrade

exit 0

%preun
if [ $1 -eq 0 ]; then
    logger -p local6.notice -t installer 'app-system-report - uninstalling'
fi

%preun core
if [ $1 -eq 0 ]; then
    logger -p local6.notice -t installer 'app-system-report-core - uninstalling'
    [ -x /usr/clearos/apps/system_report/deploy/uninstall ] && /usr/clearos/apps/system_report/deploy/uninstall
fi

exit 0

%files
%defattr(-,root,root)
/usr/clearos/apps/system_report/controllers
/usr/clearos/apps/system_report/htdocs
/usr/clearos/apps/system_report/views

%files core
%defattr(-,root,root)
%exclude /usr/clearos/apps/system_report/packaging
%dir /usr/clearos/apps/system_report
/usr/clearos/apps/system_report/deploy
/usr/clearos/apps/system_report/language
