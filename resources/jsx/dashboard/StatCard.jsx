export default function StatCard({ title, value }) {
    return (
        <article className="stat-card">
            <div className="stat-card-bar" />
            <div className="stat-card-body">
                <div className="stat-card-label">{title}</div>
                <div className="stat-card-value">{value}</div>
            </div>
        </article>
    );
}

