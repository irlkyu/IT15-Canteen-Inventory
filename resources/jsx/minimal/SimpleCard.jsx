export default function SimpleCard({ title, children }) {
    return (
        <section className="card">
            {title && <header className="card-header">{title}</header>}
            <div className="card-body">{children}</div>
        </section>
    );
}

