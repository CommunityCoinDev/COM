#ifndef CHECKUPDATE_H
#define CHECKUPDATE_H

#include <QObject>
#include <QUrl>
#include <QNetworkAccessManager>
#include <QNetworkRequest>
#include <QNetworkReply>
#include <QEventLoop>

class CheckUpdate : public QObject
{
    private:
        QNetworkAccessManager m_WebCtrl;

    public:
        explicit CheckUpdate(QObject *parent);
        virtual ~CheckUpdate();

        bool isUptodate(QString strCurrentVersion);
};

#endif // CHECKUPDATE_H
